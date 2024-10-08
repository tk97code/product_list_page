<?php include '../view/header.php';?>
<main>
    <h1>Product List</h1>
    
    <aside>
        <h2>Categories</h2>
        <nav>
            <ul>
                <?php foreach($categories as $category): ?>
                <li>
                    <a href="?category_id=<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>       
            </ul>
        </nav>
    </aside>

    <section>
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th class="right">Price</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['productCode']; ?></td>
                <td><?php echo $product['productName']; ?></td>
                <td class="right"><?php echo $product['listPrice']; ?></td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_product">
                        <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
                        <input type="hidden" name="category_id" value="<?php echo $product['categoryID']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p class="last_paragraph">
            <a href="?action=show_add_form">Add Product</a>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; ?>