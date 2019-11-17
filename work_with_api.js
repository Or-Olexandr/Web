
const requestURL = 'http://localhost/phpmyadmin/sql.php?server=1&db=testdb&table=users&pos=0';
function sendRequest(method, url) {
    return new Promise( (resolve, reject) => {
        const requestURL = url;
        const xhr = new XMLHttpRequest();
        xhr.open(method, requestURL);
        xhr.responseType = 'json';
        xhr.onload = () => {
            if (xhr.status >= 400) {
                reject(xhr.response);
            } else {
                resolve(xhr.response);
            }
        }

        xhr.onerror = () => {
            reject (xhr.response);
        }
        xhr.send()

    })
}

sendRequest('GET', requestURL).then( data => {
    create_table(data);
}).catch( error => console.error(error));

function create_table(data){
    let i,result = "<thead class=\"thead-dark\">\n" +
        "    <tr>\n" +
        "        <th scope=\"col\">id</th>\n" +
        "        <th scope=\"col\">Name</th>\n" +
        "        <th scope=\"col\">Username</th>\n" +
        "        <th scope=\"col\">Email</th>\n" +
        "        <th scope=\"col\">Phone</th>\n" +
        "        <th scope=\"col\">Website</th>\n" +
        "    </tr>\n" +
        "    </thead>\n";
    for( i=0;i<data.length;i++){

        result = result+ "<tbody >\n <tr >\n <td>\n"+data[i]["id"]+"\n</td>\n <td>\n"+data[i]["name"]+"\n</td>\n <td>\n"+data[i]["username"]+"\n</td>\n <td>\n"+
        data[i]["email"]+"\n</td>\n"+"<td>\n"+data[i]["phone"]+"\n</td>\n <td>\n"+data[i]["website"]+ "\n</td>\n </tr> \n</tbody>\n";

    }
    console.log(result);

    document.getElementById("result").innerHTML = result;

}
