<section id="section">
    <div class="spacing-90px">
    </div>
    <div class="list">
        <h2>Administrar Pedidos:</h2>
        <table>
            <tr>
                <th>N° Pedido</th>
                <th>Precio</th>
                <th>Fecha</th>
                <th>Status</th>
            </tr>
            <?php while($order = $orders->fetch_object()): ?>
                <tr>
                    <td><a href="/order/detail&id=<?=$order->id?>"><?=$order->id?></a></td>
                    <td><small>$<?=$order->total_price?> MXN</small></td>
                    <td><?=$order->date?></td>
                    <td><?=Utils::show_status($order->delivery_status)?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</section>