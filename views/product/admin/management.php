<section id="section" class="list_block">
    <h2 class="subtitle2">Administrar Productos</h2>
    <div class="list">
        <p>
            <a class="btn btn-green" href="/product/create">Crear un producto.</a>
        </p>
        <?php 
            $dir = dirname(__DIR__, 2);
            require_once $dir.'/alert/index.php'; 
        ?>
        <?php if ($products->num_rows > 1) : ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Categoría</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
                <?php while ($product = $products->fetch_object()) : ?>
                    <tr>
                        <td><?= $product->id ?></td>
                        <td><?= $product->category ?></td>
                        <td><?= $product->name ?></td>
                        <td><?= $product->price ?></td>
                        <td><?= $product->stock ?></td>
                        <td><?= $product->date ?></td>
                        <td><a href="/product/edit&id=<?=$product->id?>" class="btn btn-green text-decoration-none">Editar</a> <a href="/product/delete&id=<?=$product->id?>" class="btn btn-danger text-decoration-none">Borrar</a></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else : ?>
            <p>¡No hay productos que mostrar!</p>
        <?php endif; ?>
    </div>
</section>