# Books Exchange BackEnd
<p>This project is just for university, for course web technology</p>
<hr>
<h3>How to use it</h3>
[Endpoint URL link](https://stormy-eyrie-81072.herokuapp.com/)

please note that wea re using JWT based authentication so please send the token in request headers for all the requests that needs authentication

| Route             | method    | description                                     | request body                               | response                               |
|-------------------|-----------|-------------------------------------------------|--------------------------------------------|----------------------------------------|
| api/auth/signup   | Post      | sign up users                                   | name,email,password                        | returns 201 status ok                  |
| api/auth/login    | Post      | log users in                                    | email, password                            | returns token with status ok           |
| api/auth/recovery | Post      | sends password recovery email                   | email                                      | return 200 status ok                   |
| api/auth/resest   | Post      | reset user password                             | email,password,password_confirmation,token | returns 200 status ok                  |
| api/auth/logout   | Post      | log users out                                   |                                            | returns message                        |
| api/auth/refresh  | Post      | refresh user token                              |                                            | returns new token with status ok       |
| api/auth/me       | get       | returns current user data                       |                                            | returns user data                      |
| api/books         | get       | returns all books                               |                                            | array of books                         |
| api/books         | Post      | store book                                      | name, type , category                      | returns status  Ok                     |
| api/books/{id}    | get       | returns book based on id                        |                                            | returns book object                    |
| api/books/{id}    | Patch/Put | update book data based on id                    | name, type ,category                       | returns status ok or not authorized    |
| api/books/{id}    | Delete    | deletes a book based on book id                 |                                            | return status ok or not authorized     |
| api/offers        | get       | returns all offers                              |                                            | returns array of offers                |
| api/offers        | Post      | store offer                                     | type,book_id                               | return status ok 201                   |
| api/offers/{id}   | get       | returns specific offer based on offer id        |                                            | returns offer object                   |
| api/offers/{id}   | patch/Put | update offer based on offer id                  | type                                       | returns status ok 201                  |
| api/offers/{id}   | Delete    | delete offer based on id                        |                                            | returns status ok 201                  |
| api/contact       | get       | returns contact info of current user            |                                            | returns contact object with status 200 |
| api/contact       | Post      | store contact data for user                     | facebook_url,phone_number                  | returns status of 201                  |
| api/contact/{id}  | get       | returns contact data for user based on user id  |                                            | returns contact object                 |
| api/contact/{id}  | Patch/Put | update user contact based on auth user id       | facebook_url,phone_number                  | returns status ok or not authorized    |
| api/contact/{id} | Delete    | delete user contact based on user id            |                                            | returns status ok or not authorized    |
