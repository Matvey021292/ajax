<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #data_container {
            width: 400px;
            margin: 0 auto;
            border: 1px solid yellow;
            padding: 20px;
        }
    </style>
</head>
<body>

    <button id="button" onclick="StartAjax();">Start</button>
    <div id="data_container">

    </div>
    <script>
        function StartAjax() {
            var xhr = new XMLHttpRequest();

            xhr.open('POST', 'phones.json', true);

            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

//            xhr.timeout = 3;
//            xhr.ontimeout = function() {
//                alert( 'Извините, запрос превысил максимальное время' );
//            };
            
             xhr.send(); 
             
       
            xhr.onreadystatechange = function() {
                if (xhr.readyState != 4) return;

                button.innerHTML = 'Готово!';
                console.dir(xhr);
                if (xhr.status != 200) {
                    alert(xhr.status + ': ' + xhr.statusText);
                } else {
                    var json = xhr.responseText;
                    var arr = JSON.parse(json);
                    parssePhoneName(arr);
                }

            };

            function parssePhoneName(phones){
                var list = data_container.appendChild(document.createElement('ul'));
                phones.forEach(function(item){
                    var li = list.appendChild(createElement('li'));
                    li.innerHTML = item.name;
                });

            }

            button.innerHTML = 'Загружаю...';
        }

            // var obj= {
            //     name:"Jonh",
            //     age:30
            // };
            // console.log(JSON.stringify(obj));

    </script>
</body>
</html>