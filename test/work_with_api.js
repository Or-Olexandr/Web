
const requestURL = 'http://localhost:80/infoAboutUser.php';
function sendRequest(method, url, body = null) {
    const headers = {
        'Content-Type': 'application/json'
    };
    return fetch(url, {
        method: method,
        body: JSON.stringify(body),
        headers: headers
    }).then( response => {
        return response.json()
    })
}


sendRequest("POST", requestURL).then( data => {
    console.log(data);
    create_table(data);
}).catch( error => console.error(error));

function PopSign() {
    console.log(document.getElementById("inS").getAttribute("name"));
    if(document.getElementById("inS").getAttribute("name") === "Signin") {
        document.getElementById("result").style.display = "none";
        document.getElementById("Sign").innerHTML = "<form onsubmit=\"return false;\" >"+
            "            <div class=\"form-group row\">\n" +
            "                <label for=\"inputName\" class=\"col-sm-2 col-form-label\">Name</label>\n" +
            "                <div class=\"col-sm-10\">\n" +
            "                    <input type=\"text\" class=\"form-control\" name=\"name\" id=\"inputName\" placeholder=\"Name\" required>\n" +
            "                </div>\n" +
            "            </div>\n" +
            "            <div class=\"form-group row\">\n" +
            "                <label for=\"inputPassword\" class=\"col-sm-2 col-form-label\">Password</label>\n" +
            "                <div class=\"col-sm-10\">\n" +
            "                    <input type=\"password\" class=\"form-control\" name=\"password\" id=\"inputPassword\" placeholder=\"Password\"required>\n" +
            "                </div>\n" +
            "            </div>\n" +
            "      <button type='submit' class=\"btn btn-outline-primary\" onclick=\"signInToAcc()\" id=\"SigSub\"  name=\"Signin\">Отправить</button>"+
        "</form>"+ "<p id=\"error\"></p>";
        document.getElementById("Sign").style.display = "block";

    }
}

function signInToAcc() {

    if((document.getElementById("inputName").value!=="")&&(document.getElementById("inputPassword").value!=="")) {
        console.log(document.getElementById("inputName").value);
        let dat = {
            first_name:document.getElementById("inputName").value.trim(),
            password:document.getElementById("inputPassword").value.trim()
        };
        console.log(dat);
        sendRequest("POST","http://localhost:80/auth.php", dat).then(data => {
            console.log(data);
            CheckOnAuth(data);
        });
    }
    return false;
}
function getUser () {
    console.log(document.getElementById("isS").getAttribute("name").trim());
    let dat = {
        first_name:document.getElementById("isS").getAttribute("name").trim(),
        search_from_id:false
    };
    console.log(dat);
    sendRequest("POST","http://localhost:80/getUser.php", dat).then(data => {
        console.log(data);
        ChangeUser(data);
    });
}

function ChangeUser(data) {
    let string =  "<table>\n"+
        "<tr>\n"+
        "<th width=\"400px\" scope=\"col\"></th>\n"+
        "<th scope=\"col\"></th>\n"+
        "</tr>\n"+
        "<form onsubmit=\"return false;\"method=\"post\">\n"+
        "<tr>\n"+
        "<td width=\"400\"> <img src=http://localhost/"+data["image"]+  " width=\"200\" id='image' class=\"rounded mx-auto d-block\" height=\"150\"/><br>\n"+
        "<div class=\"form-group\">\n"+
        "<input type=\"file\" accept=\"image/jpeg, image/png\"  name=\"fileToUpload\" id=\"upload-file\" >\n"+
        "</div>\n"+
        "</td>\n"+
        "<td>\n"+
        "<div class=\"form-group\">\n"+
        "<label for=\"exampleInputName\">Name</label>\n"+
        "<input type=\"text\" value="+ data["name"]+ " class=\"form-control\" id=\"exampleInputName\" name=\"name\" placeholder=\"Enter name\">"+"</div>\n"+
        "<div class=\"form-group\">\n"+
        "<label for=\"exampleInputSurname\">Surname</label>"+
        "<input type=\"text\" value=" + data["surname"]+ " class=\"form-control\" id=\"exampleInputSurname\" name=\"surname\" placeholder=\"Enter Surname\">\n"+
        "</div>\n"+
        "<div class=\"form-group\">\n"+
        "<label for=\"exampleInputPassword1\">Password</label>"+
        "<input type=\"password\" value="+data["password"]+" class=\"form-control\" id=\"exampleInputPassword\" name=\"password\" placeholder=\"Password\">\n"+
        "</div>\n"+
        "<label class=\"mr-sm-2 sr-only\" for=\"inlineFormCustomSelect\">Preference</label>\n"+
        "<select class=\"custom-select mr-sm-2\" id=\"inlineFormCustomSelect\" name=\"Roles\">"+
        "<option selected>"+data["Role"]+"</option>\n"+
        "<option value=\"1\">Admin</option>\n"+
        "<option value=\"2\">User</option>\n"+
        "</select><br>\n"+
        "<h1></h1>\n"+

        "<button type=\"submit\" class=\"btn btn-primary\" onclick='SendChangeAndEnd()'>Submit</button>\n"+
        "</form>\n"+
        "</td>\n"+
        "</tr>\n"+
        "</table>\n"+
        "<p class=\"h1\"></p>";

    document.getElementById("result").style.display = "none";
    console.log(string);
    document.getElementById("Sign").innerHTML = string;
    document.getElementById("Sign").style.display = "block";
    document.querySelector('#upload-file').addEventListener('change', function() {
        // This is the file user has chosen
        var file = this.files[0];

        // Allowed types
        var mime_types = [ 'image/jpeg', 'image/png' ];

        // Validate MIME type
        if(mime_types.indexOf(file.type) == -1) {
            alert('Error : Incorrect file type');
            return;
        }

        // Max 2 Mb allowed
        if(file.size > 2*1024*1024) {
            alert('Error : Exceeded size 2MB');
            return;
        }

        // Validation is successful
        // This is the name of the file
        alert('You have chosen the file ' + file.name);
    });



}



function SignOut() {
    document.getElementById("result").style.display = "table";
    document.getElementById("Sign").style.display = "none";
    document.getElementById("isS").setAttribute("id","inS");
    document.getElementById("inS").setAttribute("onclick","PopSign()");
    document.getElementById("inS").innerHTML = "Sign in";
    document.getElementById("outS").setAttribute("id","upS");
    document.getElementById("upS").setAttribute("onclick","SignOut()");
    document.getElementById("outS").innerHTML = "Sign Up";

}



function CheckOnAuth(data) {
    console.log(data["success"][0]);
    if(data["success"][0]==="authorization"){
        document.getElementById("result").style.display = "table";
        document.getElementById("Sign").style.display = "none";
        document.getElementById("inS").innerHTML = data["name"];
        document.getElementById("inS").setAttribute("id","isS");
        document.getElementById("isS").setAttribute("onclick","getUser()");
        document.getElementById("isS").setAttribute("name",data["name"]);
        document.getElementById("upS").setAttribute("id","outS");
        document.getElementById("outS").setAttribute("onclick","SignOut()");
        document.getElementById("outS").setAttribute("name","SignOut");
        document.getElementById("outS").innerHTML = "Sign Out";

    }
    else
        document.getElementById("error").innerHTML=data["success"];


}

function create_table(data){
    let i,result = "<thead class=\"thead-dark\">\n" +
        "<tr>\n" +
        "<th scope=\"col\">Image</th>\n" +
        "<th scope=\"col\">id</th>\n" +
        "<th scope=\"col\">First_Name</th>\n" +
        "<th scope=\"col\">Last_Name</th>\n" +
        "<th scope=\"col\">Role</th>"+
        "</tr>\n" +
        "</thead>\n";
    for( i=0;i<data["count"];i++){

        result = result+ "<tbody >\n <tr >\n " +
            "<td width=\"400\"><img src=http://localhost/"+data["image"][i]+" width=\"200\" height=\"150\"/>\n</td>\n"+
            "<td>\n"+data["id"][i]+"\n</td>\n" +
            " <td>\n"+data["first_name"][i]+
            "\n</td>\n <td>\n"+data["last_name"][i]+
            "\n</td>\n"+"<td>"+data["role"][i]+"</td>"+
           "</tr> \n</tbody>\n";

    }
    console.log(result);

    document.getElementById("result").innerHTML = result;

}
