<section id="section">
    <div class="spacing-90px">
    </div>
    <div class="category-create">
        <h2>Dirección</h2>
        <form action="/order/save" method="POST">
            <label for="location">Localidad:</label>
            <input type="text" name="location" required/>

            <label for="address">Dirección:</label>
            <input type="text" name="address" required/>

            <label for="total_price">Total</label>
            <input type="text" name="total_price" value="<?=$cart['total']?>" placeholder="$<?=$cart['total']?>MXN" readonly />

            <input type="submit" value="Confirmar Pedido" />
        </form>
        <a href="/order/save">Regresar al carrito de compra.</a>
    </div>

</section>