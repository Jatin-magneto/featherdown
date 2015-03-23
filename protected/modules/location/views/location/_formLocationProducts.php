<div id="locationProducts" class="tab-pane" role="tabpanel">
                <?php
                    foreach(Yii::app()->user->getFlashes() as $key => $message) {
                        echo '<div class="alert alert-link alert-' . $key . '">' . $message . "</div>\n";
                    }
                ?>
                <ul class="list-inline">
                    <li>
                        <a id="add-location" data-toggle="modal" data-target="#myModal" href="javascript:void(0)"><i class="fa fa-plus"></i> Add</a>
                    </li>
                    <li>
                        <a id="edit-location" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                    </li>
                    <li>
                        <a id="delete-location" href="javascript:void(0)"><i class="fa fa-minus-square"></i> Delete</a>
                    </li>
                    <li>
                        Season
                    </li>
                    <li>
                        <select class="form-control">
                          <option>All</option>
                          <option>2015</option>
                          <option>2014</option>
                        </select>
                    </li>
                    <li>
                        <a id="export-location" href="javascript:void(0)"><i class="fa fa-file"></i> Export products</a>
                    </li>
                    <li>
                        <a id="import-location" href="javascript:void(0)"><i class="fa fa-file"></i> Import products</a>
                    </li>
                </ul>
                <!--modal start here--> 
                <!-- Modal for add product-->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                          <h4 class="modal-title" id="myModalLabel">Add products</h4>
                      </div>
                      <div class="modal-body">
                        <?php $this->renderPartial('_formProduct', array('model_lp'=>$model_lp,'model_ls'=>$model_ls)); ?>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="table-responsive">
                <table id="location-product" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th id="check-boxes" width="15">
                        <input type="checkbox" id="check-boxes_all" name="check-boxes_all">
                      </th>
                      <th width="100"> Sale Type </th>
                      <th width="100"> From </th>
                      <th width="100"> Until </th>
                      <th width="100"> Quantity </th>
                      <th width="100"> Days </th>
                      <th width="100"> Nights </th>
                      <th width="100"> Stay type</th>
                      <th width="150"> Special stay type </th>
                      <th width="100"> Price unit </th>
                      <th width="100"> Max quantity </th>
                      <th width="100"> Max quantity unit </th>
                      <th width="100"> Percentage </th>
                      <th width="100"> Purchase price </th>
                      <th width="100"> Purchase price unit </th>
                      <th width="110"> Purchase percentage </th>
                      <th width="100"> Mandatory </th>
                      <th width="100"> Primary process </th>
                      <th width="100"> Secondary process </th>
                    </tr>
                  </thead>
                </table>
                <div class="panel-group">
                	<?php
                  if(count($data) > 0) {
                    
                    $location_sale_type = CHtml::listData(LocationSaleType::model()->findAll(),'location_sale_type_id','location_sale_type');
                    $location_stay_type = CHtml::listData(LocationStayType::model()->findAll(),'location_stay_type_id','location_stay_type');
                    $location_special_type = CHtml::listData(LocationSpecialType::model()->findAll(),'location_special_type_id','location_special_type');
                    $location_unit = CHtml::listData(LocationUnit::model()->findAll(),'location_unit_id','location_unit');
                    
                    foreach($data as $key => $val) {
                      $id = $val->product_id;
                      $name = Product::model()->findall(array('condition'=>"product_id = $id",'select'=>'title'));
                      $name = $name[0]->title;
                      $l_id = $_GET['id'];
                      $product_location = LocationProduct::model()->findAll(array('condition'=>"location_id = $l_id and product_id = $id",));
                      
                      
                    ?>
                    <div id="id<?php echo $id; ?>" class="panel">
                		<div class="panel-heading" data="<?php echo $id; ?>"><i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> <?php echo $name;?></div>
                        <div class="panel-body">
                        	<table id="location-product" class="table table-striped table-bordered table-hover">
                            <tbody>
                            <?php foreach($product_location as $p_l) {
                              $sale_type = explode(',',$p_l->sale_type_id);
                              $types = array();
                              foreach($sale_type as $s_t){
                                $types[] = $location_sale_type[$s_t];
                              }
                              $types = implode(',',$types);
                              ?>
                                <tr>
                                  <td class="checkbox-column" style="width: 20px">
                                    <input type="checkbox" class="check-boxes" name="check-boxes[]" id="check-boxes_<?php echo $p_l->location_product_id; ?>" value="<?php echo $p_l->location_product_id; ?>">
                                  </td>
                                  <td width="100"><?php echo $types; ?> </td>
                                  <td width="100"> <?php echo customDateFormat('Y-m-d','m-d-Y',($p_l->stock_from != '0000-00-00')?$p_l->stock_from:''); ?> </td>
                                  <td width="100"> <?php echo customDateFormat('Y-m-d','m-d-Y',($p_l->stock_till != '0000-00-00')?$p_l->stock_till:''); ?> </td>
                                  <td width="100"> <?php echo $p_l->total_qty; ?> </td>
                                  <td width="100"> <?php echo $p_l->available_days; ?> </td>
                                  <td width="100"> <?php echo $p_l->available_nights; ?> </td>
                                  <td width="100"> <?php echo $location_stay_type[$p_l->available_type]; ?></td>
                                  <td width="150"> <?php echo $location_special_type[$p_l->available_special_type_id]; ?> </td>
                                  <td width="100"> <?php echo $location_unit[$p_l->sale_price_unit_id]; ?> </td>
                                  <td width="100"> <?php echo $p_l->sale_max_qty; ?> </td>
                                  <td width="100"> <?php echo $location_unit[$p_l->sale_max_unit_id]; ?> </td>
                                  <td width="100"> <?php echo $p_l->sale_percentage; ?> </td>
                                  <td width="100"> <?php echo $p_l->purchase_price; ?> </td>
                                  <td width="100"> <?php echo $location_unit[$p_l->purchase_price_unit_id]; ?></td>
                                  <td width="100"> <?php echo $p_l->purchase_percentage; ?> </td>
                                  <td width="110"> <?php echo ($p_l->is_manadatory == 1) ? "Yes" : "No"; ?> </td>
                                  <td width="100"> <?php echo ($p_l->primary_status == 1) ? "Yes" : "No"; ?> </td>
                                  <td width="100"> <?php echo ($p_l->secondary_status == 1) ? "Yes" : "No"; ?> </td>
                                </tr>
                            <?php } ?>
                            </tbody></table>
                        </div>
                	</div>
                    <?php }
                    } else { ?>
                    
                    
                    <?php } ?>
                </div>
                </div>
              </div>