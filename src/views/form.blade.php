<html>
    <head>
        <title>GCM Test</title>
    </head>
    <body>
        @if (!empty($result))
        <pre>
            {{ print_r($result, 1) }}
        </pre>
        @endif
        <form action="{{ URL::current() }}" method="post">
            <input type="text" name="device_id" placeholder="Device ID"><br>
            <input type="text" name="gcm_id" placeholder="GCM ID"><br>
            <input type="text" name="subject" placeholder="Subject"><br>
            <input type="text" name="message" placeholder="Message"><br>
            <button type="submit">Send!</button>
        </form>
    </body>
</html>