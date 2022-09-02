let form = document.getElementById("form");
form.oninput = function () {
    let inputPlace = document.getElementById("result");
    if (inputPlace) {
        inputPlace.innerHTML = '';
    } else {
        inputPlace = document.createElement("div");
        inputPlace.id = "result";
        inputPlace.className = "result";
        form.after(inputPlace);
    }

    let string = document.getElementById("input").value;
    if (string.length >= 3) {
        const request = new XMLHttpRequest();
        let param = {
            string: string
        }
        param = JSON.stringify(param);
        request.open("POST", 'searchAjax.php', true);
        request.responseType = 'text';
        request.addEventListener("readystatechange", function () {
            if (request.readyState == 4 && request.status == 200) {
                let obj = request.response;
                inputPlace.insertAdjacentHTML('beforeend', obj);
            }
        });

        request.send(param);
    } else {
        inputPlace.insertAdjacentHTML('beforeend', "<div style='color: red'>Поиск минимум по 3 символам</div>");
    }

}

document.getElementById("addPosts").addEventListener('click', function () {

    let addPostsCount = document.getElementById("addPostsCount");
    if (addPostsCount) {
        addPostsCount.innerHTML = '';
    } else {
        addPostsCount = document.createElement("div");
        addPostsCount.id = "addPostsCount";
        addPostsCount.className = "addPostsCount";
        let form = document.getElementById("addPosts");
        form.after(addPostsCount);
    }

    const request = new XMLHttpRequest();
    request.open("POST", 'databaseFilling.php', true);
    request.responseType = 'text';
    request.addEventListener("readystatechange", function () {
        if (request.readyState == 4 && request.status == 200) {
            let obj = request.response;
            addPostsCount.insertAdjacentHTML('beforeend', obj);
        }
    });

    request.send();
});
