<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>HTMLファイルからPOSTでJSONデータを送信する</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<script type="text/javascript">
    $(function(){
        $("#response").html("Response Values");

        $("#button").click( function(){
            var url = $("#url_post").val();

                var JSONdata = {
                    value1: $("#value1").val(),
                    value2: $("#value2").val()
                };

            alert(JSON.stringify(JSONdata));

            $.ajax({
                type : 'post',
                url : url,
                data : JSON.stringify(JSONdata),
                contentType: 'application/JSON',
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
    <p>URL: <input type="text" id="url_post" name="url" size="100" value="http://testurl/"></p>
    <p>value1: <input type="text" id="value1" size="30" value="値1"></p>
    <p>value2: <input type="text" id="value2" size="30" value="値2"></p>
    <p><button id="button" type="button">submit</button></p>
    <textarea id="response" cols=120 rows=10 disabled></textarea>
</body>
</html>
