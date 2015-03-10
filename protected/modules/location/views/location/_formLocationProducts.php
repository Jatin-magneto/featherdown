<div id="locationProducts" class="tab-pane" role="tabpanel">
                <ul class="list-inline">
                    <li>
                        <a data-toggle="modal" data-target="#myModal" href="javascript:void(0)"><i class="fa fa-plus"></i> Add</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#purchasePrice" href="javascript:void(0)"><i class="fa fa-pencil-square-o"></i> Set purchase price</a>
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
                        <a href="javascript:void(0)"><i class="fa fa-file"></i> Copy season</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-file"></i> Copy season from location</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-file"></i> Export products</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-file"></i> Import products</a>
                    </li>
                </ul>
                <!--modal start here--> 
                <!-- Modal for add product-->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                  <?php $this->renderPartial('_formProduct', array()); ?>
                </div>
                
                <!-- Modal for set Purchase price -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="purchasePrice" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                        <h4 id="myModalLabel" class="modal-title">Set purchase price of selected products</h4>
                      </div>
                          <div class="modal-body">
                            <form class="form-horizontal">
                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Purchase price</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" placeholder="0">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Percentage of sale price</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" placeholder="0">
                                        </div>
                                      </div>
                                  <div class="form-group">
                                    <label class="col-sm-4 control-label">Unit</label>
                                    <div class="col-sm-7">
                                      <select class="form-control">
                                        <option>Purchase price unit</option>
                                        <option>Per day</option>
                                        <option>Per hour</option>
                                      </select>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label class="col-sm-4 control-label">Purchase percentage</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control" placeholder="0">
                                    </div>
                                  </div>
                                  
                                </form>
                          </div>
                      <div class="modal-footer">
                        <button class="btn btn-success" type="button">Save</button>
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--modal end here-->
                <div class="table-responsive">
                <table id="location-product" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th width="100"> Sale Type </th>
                      <th width="100"> From </th>
                      <th width="100"> Until </th>
                      <th width="100"> Quantity </th>
                      <th width="100"> Days </th>
                      <th width="100"> Nights </th>
                      <th width="100"> Stay type</th>
                      <th width="150"> Special stay type </th>
                      <th width="100"> Price </th>
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
                	<div id="id1" class="panel">
                		<div class="panel-heading"><i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Heading</div>
                        <div class="panel-body">
                        	<table id="location-product" class="table table-striped table-bordered table-hover">
                                <tbody><tr>
                                  <td width="100"> Office, Website </td>
                                  <td width="100"> 3-04-15 </td>
                                  <td width="100"> 2-11-15 </td>
                                  <td width="100"> 0 </td>
                                  <td width="100"> zmdwdvz </td>
                                  <td width="100"> 0 </td>
                                  <td width="100"> N/A</td>
                                  <td width="150"> Special stay type </td>
                                  <td width="100"> 7.50 </td>
                                  <td width="100"> Each </td>
                                  <td width="100"> 0 </td>
                                  <td width="100"> Max quantity unit </td>
                                  <td width="100"> 0.00 </td>
                                  <td width="100"> 7.50</td>
                                  <td width="100"> Each </td>
                                  <td width="110"> 0.00 </td>
                                  <td width="100"> 0 </td>
                                  <td width="100"> 1 </td>
                                  <td width="100"> 1 </td>
                                </tr>
                                <tr>
                                  <td width="100"> Office, Website </td>
                                  <td width="100"> 3-04-15 </td>
                                  <td width="100"> 2-11-15 </td>
                                  <td width="100"> 0 </td>
                                  <td width="100"> zmdwdvz </td>
                                  <td width="100"> 0 </td>
                                  <td width="100"> N/A</td>
                                  <td width="150"> Special stay type </td>
                                  <td width="100"> 7.50 </td>
                                  <td width="100"> Each </td>
                                  <td width="100"> 0 </td>
                                  <td width="100"> Max quantity unit </td>
                                  <td width="100"> 0.00 </td>
                                  <td width="100"> 7.50</td>
                                  <td width="100"> Each </td>
                                  <td width="110"> 0.00 </td>
                                  <td width="100"> 0 </td>
                                  <td width="100"> 1 </td>
                                  <td width="100"> 1 </td>
                                </tr>
                            </tbody></table>
                        </div>
                	</div>
                    <div id="id2" class="panel">
                		<div class="panel-heading"><i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Heading</div>
                        <div class="panel-body">
                        	<table id="location-product" class="table table-striped table-bordered table-hover">
                                <tbody><tr>
                                  <td width="100"> Office, Website </td>
                                  <td width="100"> 3-04-15 </td>
                                  <td width="100"> 2-11-15 </td>
                                  <td width="100"> 0 </td>
                                  <td width="100"> zmdwdvz </td>
                                  <td width="100"> 0 </td>
                                  <td width="100"> N/A</td>
                                  <td width="150"> Special stay type </td>
                                  <td width="100"> 7.50 </td>
                                  <td width="100"> Each </td>
                                  <td width="100"> 0 </td>
                                  <td width="100"> Max quantity unit </td>
                                  <td width="100"> 0.00 </td>
                                  <td width="100"> 7.50</td>
                                  <td width="100"> Each </td>
                                  <td width="110"> 0.00 </td>
                                  <td width="100"> 0 </td>
                                  <td width="100"> 1 </td>
                                  <td width="100"> 1 </td>
                                </tr>
                            </tbody></table>
                        </div>
                	</div>
                </div>
                </div>
              </div>