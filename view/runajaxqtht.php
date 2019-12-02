<?php

include_once("../model/entity/learninghistory.php");

$rsFromFile = LearningHistory::getListFromFile("101");

?>
           <?php 
                        $stt = 0;
                        foreach($rsFromFile as $key => $value){
                            $stt++;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $stt; ?></th>
                                <td><?php echo $value->yearFrom; ?></td>
                                <td><?php echo $value->yearTo; ?></td>
                                <td><?php echo $value->schoolName; ?></td>
                                <td><?php echo $value->schoolAddress; ?></td>
                                <td>
                                    <a href="quatrinhhoctap.php?id=<?php echo $stt; ?>" class="btn btn-outline-success mr-3">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <button onclick="remove(<?php echo $stt; ?>)" class='btn btn-outline-danger'><i class="fas fa-trash"></i> Xóa</button>

                                </td>
                        </tr>
                         <?php
                        }?>