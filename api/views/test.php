<!DOCTYPE html>
<html lang='pt'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test</title>
    </head>

    <body>
        <p id='msg'></p>
    </body>

    <script type='module'>

        import { HttpRequest } from './assets/js/httpreq.js';

        window.addEventListener('load', async () =>
        {
            let req = await HttpRequest('testdb');

            console.log(req);

            window['msg'].innerText = req['response'];
        });

    </script>
</html>