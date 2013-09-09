<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" media="screen" href="/css/style.css" />
        <title>Product Getter</title>
    </head>
    <body>
        <form name="productForm" action="/" method="POST" id="productForm">
            <input type="text" name="url" id="url" />
            <input type="submit" name="submit" value="submit" />
        </form>
        <div id="total">
            <?php if ($total): ?>
                <?php echo $total ?> product writed
            <?php endif; ?>
        </div>
        <div id="dublicated">
            <?php if ($dublicated): ?>
                <?php echo $dublicated ?> products are dubpicated, did not touch old ones.
            <?php endif; ?>
        </div>
        <script src="/js/ajax.js" type="text/javascript"></script>
        <script src="/js/productform.js" type="text/javascript"></script>
    </body>
</html>
