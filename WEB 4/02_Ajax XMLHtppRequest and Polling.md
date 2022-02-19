## AJAX | XMLHttpRequest and Polling
---

### AJAX

- **A**synchronous **J**avascript **A**nd **X**ML

> Allows users to interact with your web application without completely reloading the page.

#### Synchronous Web Model

- "request/response":
    - **enter** data
    - **send** page to the server
    - **wait** for response
- &rArr; **Synchronous**: User has to wait.

- Disadvantages
    - Wasted time
    - Pager refresh &rArr; new request
        - extra processing
        - lost time
        - highwer bandwidth consumption


#### Asynchronous Web Model

> Introduces the idea of a “partial screen update” to the web application model
- only the user interface elements that contain new information will be updated
- the rest of the user interface will be unchanged


#### Ajax Technologies

- **Old**
    - HTML and JS &rArr; DHTML(Dynamic HTML)
    - XMLHttpRequest
- **New**
    - JS fetch, promise,...
- JSON (xml in the past)
- Server side


##### Response

- Data transfer from server to client
    - String
    - XML (old)
    - JSON
        - JavaScript Object Notation
        - Easier alternative to XMl
        - [Convert Java Object to / from JSON](http://www.mkyong.com/java/jackson-2-convert-java-object-to-from-json/)


#### setTimeout & setInterval

- setTimeout(function, milliseconds)
    - executes function after waiting
- setInterval(function, milliseconds)
    - same as setTimeout(), but repeats the function continuously


---

### Links

#### Demo
- [UCLLWebontwikkeling4 · GitHub](https://github.com/UCLLWebontwikkeling4)
#### References
- [AJAX Basics Explained | Medium](https://medium.com/free-code-camp/ajax-basics-explained-by-working-at-a-fast-food-restaurant-88d95f5fcb7a)