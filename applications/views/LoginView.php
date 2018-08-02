<div>
    <p ><?php  echo $data ?></p>
<form method="post" action="login">
    <table>
        <?php if(empty($data)){

         ?>
        <tr>
            <td><label for="loginField">Логин</label></td>
            <td><input id="loginField" type="text" name="login"></td>
        </tr>
        <tr>
            <td><label for="passwordField">Пароль</label></td>
            <td><input id="passwordField" type="text" name="password"></td>
        </tr>
        <tr>
            <td> <button type="submit">login</button></td>
            <td><input type="checkbox" name="remembermme" />Запомнить</td>
            <?php }else{ ?>
                <td align="right">  <button type="submit" name = "logout">logout</button></td>

            <?php  }?>


        </tr>


    </table>
</form>
</div>
