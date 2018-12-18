<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Straas</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body id="preview">
<h1><a id="Straas_0"></a>Straas</h1>
<p>Strings as a service</p>
<hr>
<h1><a id="Endpoints_5"></a>Endpoints</h1>
<p>All endpoints are prefixed with <a href="https://straas.duncte123.com/api">https://straas.duncte123.com/api</a></p>
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Endpoint</th>
        <th>Method</th>
        <th>Description</th>
        <th>Post Data</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>/strings</td>
        <td>GET</td>
        <td>Get a list of your strings</td>
        <td></td>
    </tr>
    <tr>
        <td>/strings</td>
        <td>POST</td>
        <td>Add a new string</td>
        <td>value: The string value</td>
    </tr>
    <tr>
        <td>/strings/{id}</td>
        <td>PATCH</td>
        <td>Update a string</td>
        <td>value: The string value</td>
    </tr>
    <tr>
        <td>/strings/{id}</td>
        <td>DELETE</td>
        <td>Deletes a string</td>
        <td></td>
    </tr>
    </tbody>
</table>
<h1><a id="Tokens_15"></a>Tokens</h1>
<p>Token management is done via the token endpoints<br>
    The <code>POST</code> and <code>PATCH</code> endpoints respond with a token object</p>
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Endpoint</th>
        <th>Method</th>
        <th>Description</th>
        <th>Post Data</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>/tokens</td>
        <td>POST</td>
        <td>Create a new token</td>
        <td></td>
    </tr>
    <tr>
        <td>/tokens</td>
        <td>PATCH</td>
        <td>Generate a new token</td>
        <td></td>
    </tr>
    <tr>
        <td>/tokens</td>
        <td>DELETE</td>
        <td>Deletes your token and the string associated with it</td>
        <td></td>
    </tr>
    </tbody>
</table>
<p>Please note:<br>
    If you accidentally delete a string we will be able to get it back, unless you deleted your token</p>
<h3><a id="Example_request_28"></a>Example request</h3>
<pre><code class="language-BASH">curl -X POST https://straas.duncte123.com/api/strings --header <span
            class="hljs-string">"Content-Type: application/json"</span> --data <span class="hljs-string">'{"value": "Hello world"}'</span> --header <span
            class="hljs-string">"Authorization: Token [token]"</span>
</code></pre>
<p>Replace &quot;<em>[token]</em>&quot; with your roken</p>
<h1><a id="Objects_35"></a>Objects</h1>
<p>Example string object:</p>
<pre><code class="language-JSON">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span
                class="hljs-number">4798426135536</span></span>,
    "<span class="hljs-attribute">value</span>": <span class="hljs-value"><span class="hljs-string">"Hello World"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2018-12-17 11:39:25"</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2018-12-19 15:23:49"</span>
</span>}
</code></pre>
<p>Example user object:</p>
<pre><code class="language-JSON">{
    "<span class="hljs-attribute">token</span>": <span class="hljs-value"><span class="hljs-string">"f3a3bc45-e72a-4518-adf8-7f136c51fa0e"</span>
</span>}
</code></pre>
</body>
</html>
