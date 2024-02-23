<?php

    function getAlimentos($com) {
        $sql = 'SELECT * FROM alimento';
        $result = $com->query($sql);
    
        $alimentos_info = array();
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $alimentos_info[] = array(
                    'id' => $row['ID_alimento'],
                    'nome' => $row['nome'],
                    'proteinas' => $row['proteinas'],
                    'gorduras' => $row['gorduras'],
                    'carboidratos' => $row['carboidratos'],
                    'calorias' => $row['kcal'],
                    'qtde' => $row['porcao']
                    // 'image' => $row['img']
                );
            }
        }
        return $alimentos_info;
    }

    function getAlimentos_nameID($com) {
        $sql = 'SELECT ID_alimento, nome FROM alimento';
        $result = $com->query($sql);
        $alimentos = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $alimentos[$row['nome']] = $row['ID_alimento'];
            }
        }
        return $alimentos;
    }
?>


