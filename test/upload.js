function sendRequest2(method, url, body = null) {
    const headers = {

    };
    return fetch(url, {
        method: method,
        body: body,
        headers: headers
    }).then( response => {
        return response.json()
    })
}

function SendChangeAndEnd() {
    let dat = new FormData();
    console.log(document.querySelector('#upload-file').files[0]);
   // dat.append('image',document.querySelector('#upload-file').files[0]);
    console.log(document.getElementById("inlineFormCustomSelect").value.trim());
    // console.log(document.querySelector('#upload-file').files[0]);
    if(typeof document.querySelector('#upload-file').files[0] ==="undefined") {
        dat.append('name', document.getElementById("exampleInputName").value.trim());
        dat.append('surname', document.getElementById("exampleInputSurname").value.trim());
        dat.append('password', document.getElementById("exampleInputPassword").value.trim());
        dat.append('Roles', document.getElementById("inlineFormCustomSelect").value.trim());
        dat.append('image', "NULL");
    }
    else{
        dat.append('name', document.getElementById("exampleInputName").value.trim());
        dat.append('surname', document.getElementById("exampleInputSurname").value.trim());
        dat.append('password', document.getElementById("exampleInputPassword").value.trim());
        dat.append('Roles', document.getElementById("inlineFormCustomSelect").value.trim());
        dat.append('image', document.querySelector('#upload-file').files[0]);
    }
    sendRequest2("POST","http://localhost:80/ChangeUser.php", dat).then(data => {
        console.log(data);
        // create_table(data);
    });
    document.getElementById("isS").innerHTML = document.getElementById("exampleInputName").value.trim();
    document.getElementById("result").style.display = "table";
    document.getElementById("Sign").style.display = "none";
}
