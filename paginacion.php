<nav aria-label="...">
    <ul class="pagination">
        <?php 
            if(isset($_POST['busqueda'])){
                $numero_paginas = numero_paginas_busqueda($blog_config['post_por_pagina'], $busqueda, $turnos_string, $ciudad, $estado, $conexion);
            }else{
                $numero_paginas = numero_paginas($blog_config['post_por_pagina'], $ciudad,$estado, $conexion);
            }
        ?>
        

        <?php if (pagina_actual() === 1) : ?>
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        <?php else : ?>
            <li class="page-item"><a class="page-link" href="inicio.php?<?php echo 'p=' . (pagina_actual() - 1) . '&ciudad=' . $ciudad . '&estado=' . $estado;if($url != ''){echo $url;} ?>">Previous</a></li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $numero_paginas; $i++) : ?>
            <?php if (pagina_actual() === $i) : ?>
                <li class="page-item active"><span class="page-link"><?php echo $i; ?></span></li>
            <?php else : ?>
                <li class="page-item"><a class="page-link" href="inicio.php?<?php echo 'p=' . $i  . '&ciudad=' . $ciudad . '&estado=' . $estado;if($url != ''){echo $url;} ?>"><?php echo $i; ?></a></li>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if (pagina_actual() == $numero_paginas) : ?>
            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
        <?php else : ?>
            <li class="page-item"><a class="page-link" href="inicio.php?<?php echo 'p=' . (pagina_actual() + 1) . '&ciudad=' . $ciudad . '&estado=' . $estado; if($url != ''){echo $url;} ?>">Next</a></li>
        <?php endif; ?>
    </ul> 
</nav>