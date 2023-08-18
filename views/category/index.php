<section id="section" class="list_block">
    <h2 class="subtitle2">Categorías</h2>
    <div class="list">
        <p>
            <a class="btn btn-green" href="/category/create">Crear una categoría.</a>
        </p>
        <?php if( isset($_SESSION['category']) && $_SESSION['category'] == 'successful' ): ?>
            <span>¡Categoría Creada con Éxito!</span>
        <?php elseif( isset($_SESSION['category']) && $_SESSION['category'] == 'failed' ): ?>
            <span>¡Hubo un fallo, vuelve a intentar, por favor!</span>
        <?php endif; ?>
        <?php Utils::deleteSession('category'); ?>
        <?php if($categories): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Categoría</th>
                </tr>
                <?php while($category = $categories->fetch_object()): ?>
                    <tr>
                        <td><?=$category->id?></td>
                        <td><?=$category->name ?></td>
                    </tr>
                    
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>¡No hay categorías!</p>
        <?php endif; ?>
    </div>
</section>