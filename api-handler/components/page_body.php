<?php

/* Ugarit transliterator main body */

?>
<section>
    <p>Version <?php echo defined('UGARIT_VERSION'); ?></p>
    <button>This is a button</button>
</section>

<script type="module">

    import { HttpRequest } from './js/httpreq.js';

    window.onload = () =>
    {
        setControls();
    };

    async function setControls ()
    {
        let res = await HttpRequest('testdb');
        console.log(res);
    }

</script>