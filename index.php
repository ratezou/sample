<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>HTMLファイルからPOSTでJSONデータを送信する</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<script type="text/javascript">
    $(function(){
        $("#response").html("Response Values");

        $("#button").click( function(){
            var url = $("#url_post").val();

                var JSONdata = {
                    key1: $("#key1").val(),
                    key2: $("#key2").val()
                };

            alert(JSON.stringify(JSONdata));

            $.ajax({
                type : 'post',
                url : url,
                data : JSON.stringify(JSONdata),
                contentType: 'application/json',
                dataType : 'JSON',
                scriptCharset: 'utf-8',
                success : function(data) {

                    // Success
                    alert("success");
                    alert(JSON.stringify(data));
                    $("#response").html(JSON.stringify(data));
                },
                error : function(data) {

                    // Error
                    alert("error");
                    alert(JSON.stringify(data));
                    $("#response").html(JSON.stringify(data));

                }
            });
        })
    })
</script>

</head>
<body>
    <h1>HTMLファイルからPOSTでJSONデータを送信する</h1>
    <p>URL: <input type="text" id="url_post" name="url" size="100" value="https://ratezou-sample.herokuapp.com/api.php"></p>
    <p>key1: <input type="text" id="key1" size="30" value="1"></p>
    <p>key2: <input type="text" id="key2" size="30" value="2"></p>
    <p><button id="button" type="button">submit</button></p>
    <textarea id="response" cols=120 rows=10 disabled></textarea>
</body>
</html>
