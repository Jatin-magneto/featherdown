<div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                        <h4 id="myModalLabel" class="modal-title">Add Product</h4>
                      </div>
                      <div class="modal-body">
                        <!--tabs start here-->
                        <div role="tabpanel">
                          <!-- Nav tabs -->
                          <ul role="tablist" class="nav nav-tabs">
                            <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="availability" href="#availability" aria-expanded="true">Availability</a></li>
                            <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="sales" href="#sales" aria-expanded="true">Sales</a></li>
                            <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="purchase" href="#purchase" aria-expanded="true">Purchase</a></li>
                          </ul>
                        
                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div id="availability" class="tab-pane active" role="tabpanel">
                            	<form class="form-horizontal">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Product</label>
                            <div class="col-sm-7">
                              <select class="form-control">
                                <option>Select product</option>
                                <option>_Discount 10£</option>
                                <option>_Discount 20£</option>
                                <option>_Discount 30£</option>
                                <option>_Discount 40£</option>
                                <option>_Discount 50£</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">From</label>
                            <div class="col-sm-7">
                              <input type="text" placeholder="" class="form-control date-picker hasDatepicker" id="dp1425888007168">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Until</label>
                            <div class="col-sm-7">
                              <input type="text" placeholder="" class="form-control date-picker hasDatepicker" id="dp1425888007169">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Quantity</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control small" placeholder="0">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Type</label>
                            <div class="col-sm-7">
                              <select class="form-control">
                                <option>N/A</option>
                                <option>Option 1</option>
                                <option>Option 1</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Special Type</label>
                            <div class="col-sm-7">
                              <select class="form-control">
                                <option>Select Special Type</option>
                                <option>2 Night Weekday</option>
                                <option>3 Night Weekday</option>
                                <option>4 Night Weekday</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Days</label>
                            <div class="col-sm-7">
                              <label class="checkbox-inline">
                                <input type="checkbox" value="option1" name="checkbox">
                                zondag </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" value="option2" name="checkbox">
                                maandag </label>
                                <label class="checkbox-inline">
                                <input type="checkbox" value="option2" name="checkbox">
                                dinsdag </label>
                                <label class="checkbox-inline">
                                <input type="checkbox" value="option2" name="checkbox">
                                woensdag </label>
                                <label class="checkbox-inline">
                                <input type="checkbox" value="option2" name="checkbox">
                                donderdag </label>
                                <label class="checkbox-inline">
                                <input type="checkbox" value="option2" name="checkbox">
                                vrijdag </label>
                                <label class="checkbox-inline">
                                <input type="checkbox" value="option2" name="checkbox">
                                zaterdag </label>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Nights</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control small" placeholder="1">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Mandatory</label>
                            <div class="col-sm-7">
                              <label class="radio-inline">
                                <input type="radio" value="option1" name="radio">
                                Ja </label>
                              <label class="radio-inline">
                                <input type="radio" value="option2" name="radio">
                                Nee </label>
                            </div>
                          </div>
                        </form>
                            </div>
                            <div id="sales" class="tab-pane" role="tabpanel">
                            	<form class="form-horizontal">
                              <div class="form-group">
                            <label class="col-sm-4 control-label">Price</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control " placeholder="Price">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Price unit</label>
                            <div class="col-sm-7">
                              <select class="form-control">
                                <option>Select Price unit</option>
                                <option>Per day</option>
                                <option>Per hour</option>
                              </select>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Max quantity</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control " placeholder="Max quantity">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Max quantity unit</label>
                            <div class="col-sm-7">
                              <select class="form-control">
                                <option>Max quantity unit</option>
                                <option>Per day</option>
                                <option>Per hour</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Percentage</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control " placeholder="0">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Sale Type</label>
                            <div class="col-sm-7">
                              <label class="checkbox-inline">
                                <input type="checkbox" value="option1" name="checkbox">
                                Office </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" value="option2" name="checkbox">
                                Website </label>
                                
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Primary process</label>
                            <div class="col-sm-7">
                              <label class="radio-inline">
                                <input type="radio" value="option1" name="radio1">
                                Ja </label>
                              <label class="radio-inline">
                                <input type="radio" value="option2" name="radio1">
                                Nee </label>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Secondary process</label>
                            <div class="col-sm-7">
                              <label class="radio-inline">
                                <input type="radio" value="option1" name="radio">
                                Ja </label>
                              <label class="radio-inline">
                                <input type="radio" value="option2" name="radio">
                                Nee </label>
                            </div>
                          </div>
                        </form>
                            </div>
                            <div id="purchase" class="tab-pane" role="tabpanel">
                            	<form class="form-horizontal">
                                  <div class="form-group">
                                <label class="col-sm-4 control-label">Purchase price</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control " placeholder="0">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-4 control-label">Purchase price unit</label>
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
                                  <input type="text" class="form-control " placeholder="0">
                                </div>
                              </div>
                              
                            </form>
                            </div>
                          </div>
                        
                        </div>
                        <!--tabs end here-->
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-success" type="button">Save</button>
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                      </div>
                    </div>
                  </div>