<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

global $head, $style, $body, $end;
$head = '<html><head>';
$style = <<<EOF
<style>
body {
    font-size:16pt;
    color:#999;
}
h1 {
    font-size:100pt;
    text-align:right;
    color:#eee;
    margin:-30px 0px -50px 0px;
}
</style>
EOF;
$body = '</head><body>';
$end = '</body></html>';

function tag($tag, $txt)
{
    return "<{$tag}>" . $txt . "</{$tag}>";
}

class HelloController extends Controller
{
    public function index(Request $request, Response $response) {
        global $head, $style, $body, $end;
        $html = $head
                . tag('title', 'Hello/Index')
                . $style
                . $body
                . tag('h1', 'Hello')
                . tag('h3', 'Request')
                . tag('pre', "{$request}")
                . tag('h3', 'Response')
                . tag('pre', "{$response}")
                . $end;
        $response->setContent($html);
        return $response;
    }
}

/*
    public function other()
    {
        global $head, $style, $body, $end;

        $html = $head
                . tag('title', 'Hello/Other')
                . $style
                . $body
                . tag('h1', 'Other')
                . tag('p', 'This is Other page')
                . $end;
        return $html;
    }

    public function __invoke() {
        return <<<EOF
<html>
<head>
<title>Hello</title>
<style>
body {
    font-size:16pt;
    color:#999;
}
h1 {
    font-size:100pt;
    text-align:right;
    color:#eee;
    margin:-30px 0px -50px 0px;
}
</style>
<head>
<body>
    <h1>Single Action</h1>
    <p>これはシングルアクションコントローラのアクションです。</p>
</body>
</html>
EOF;

    }
*/

