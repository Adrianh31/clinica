
<html>
    <body>
        <table style="border:1px solid #000;width: 600px; height: 300px;margin: auto;font-family: Arial; font-size: 15px;">
            <tr>
                <td style="background-color: #00ba8b;height: 40px;">
                    <span style="color: white;font-size: 22px;"><?php echo $this->config->item('name_company') ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-top: 10px; margin-bottom: 10px;">
                        Estimado(a) <?php echo $cita->NOMBRE_PACIENTE ?>, su cita ha sido creado satisfactoriamente. <br/><br/>
                        Ahora solo necesita validarla por medio del siguiente enlace 
                        <a href="<?php echo $enlaceValidarCita ?>"><?php echo $enlaceValidarCita ?></a><br/><br/>
                        Lo esperamos el dia <?php echo $cita->FECHA; ?> a las <?php echo $cita->HORA_INICIO; ?><br/><br/>

                        Atentamente<br/>
                        <?php echo $this->config->item('name_company') ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="background-color: #333333;height: 25px;">
                    <span style="color: white;font-size: 14px;"><?php echo $this->config->item('name_company') ?></span>
                </td>
            </tr>
        </table>
    </body>
</html>
