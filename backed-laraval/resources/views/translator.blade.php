<!DOCTYPE html>
<html>
<head>
    <title>English/Tanglish to Tamil Translator</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background: #f5f7fa;
        }

        .card{
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,.1);
        }

        textarea{
            width:100%;
            min-height:150px;
            padding:10px;
            margin-bottom:15px;
            font-size:16px;
        }

        button{
            padding:10px 20px;
            margin-right:10px;
            cursor:pointer;
        }

        #result{
            margin-top:20px;
            min-height:150px;
            padding:10px;
            background:#eef2ff;
            border-radius:5px;
            font-size:18px;
        }
    </style>
</head>
<body>

<div class="card">

    <h2>English / Tanglish → Tamil Translator</h2>

    <textarea id="inputText"
        placeholder="Type English or Tanglish here..."></textarea>

    <button onclick="translateText()">Translate</button>
    <button onclick="copyText()">Copy</button>
    <button onclick="clearText()">Clear</button>

    <div id="result"></div>

</div>

<script>

function translateText() {

    let text = document.getElementById('inputText').value;

    if(!text.trim()){
        alert('Enter text');
        return;
    }

    fetch('/translate',{
        method:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        body:JSON.stringify({
            text:text
        })
    })
    .then(res=>res.json())
    .then(data=>{
        document.getElementById('result').innerText =
            data.translated_text;
    });
}

function copyText(){
    navigator.clipboard.writeText(
        document.getElementById('result').innerText
    );
    alert('Copied!');
}

function clearText(){
    document.getElementById('inputText').value='';
    document.getElementById('result').innerText='';
}

</script>

</body>
</html>