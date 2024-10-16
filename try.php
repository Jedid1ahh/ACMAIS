<?php
if(isset($_POST['select'])){
    if(!empty($_POST['Banana'])){
        foreach($_POST['Banana'] as $select){
            if($select == 'Carica Papaya'){
                echo "You Are Funny";
            }else{
                echo ' '.$select;
            }
        }
    }else{
        echo "Please select the value";
    }
}
if(isset($_POST['submit'])){
    if(!empty($_POST['Fruit'])){
        foreach($_POST['Fruit'] as $selected){
            if($selected == 'Banana'){
                echo "
                <select name='Banana[]'>
                <option value='' disabled selected>Choose Option</option>
                <option value='Carica Papaya'>Carica Papaya</option>
                <option value='Bananas'>Bananas</option>
                <option value='Coconuts'>Coconuts</option>
                <option value='Blueberries'>Blueberries</option>
                <option value='Strawberries'>Strawberries</option>
            </select>
            <input type='submit' name='select' value='Select'>
                ";
            }else{
                echo ' '.$selected;
            }
        }
    }else{
        header("Location: trying.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Try</title>
        <style>
            .wrapper{
                display: grid;
                grid-gap: 1rem;
                grid-template-columns: 1fr 1fr 1fr;
                grid-auto-flow: dense;
                padding: 1rem;
            }
            .box{
                background-color: red;
                color: #fff;
                border-radius: 0.5rem;
                padding: 1rem;
                font-size: 200%;
            }
        </style>
    </head>
    <body>
        <form action="" method="POST">
            <select name="Fruit[]">
                <option value="" disabled selected>Choose Option</option>
                <option value="Apple">Apple</option>
                <option value="Banana">Banana</option>
                <option value="Coconut">Coconut</option>
                <option value="Blueberry">Blueberry</option>
                <option value="Strawberry">Strawberry</option>
            </select>
            <input type="submit" name="submit" value="Choose Options">
        </form>
    </body>
</html>