<?php  include('admin_header.php'); ?>
<div class="container">
<!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="toggle-right"></i></span></span>Form Element</h4>
    </div>
<!-- /Title -->
<!-- Row -->
            <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Form controls</h5>
                            <p class="mb-25">Textual form controls—like inputs, selects, and textareas—are styled with the <code>.form-control</code> class. Included are styles for general appearance, focus state, sizing, and more.</p>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control mt-15" placeholder="Input Box">
                                            <select class="form-control custom-select  mt-15">
                                                <option selected>Select</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <textarea class="form-control mt-15" rows="3" placeholder="Textarea"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control mt-15" placeholder="Readonly Input Box" value="Readonly Input Box" readonly>
                                            <select class="form-control custom-select mt-15">
                                                <option selected>Readonly Select</option>
                                                <option value="1" disabled>One</option>
                                                <option value="2" disabled>Two</option>
                                                <option value="3" disabled>Three</option>
                                            </select>
                                            <textarea class="form-control mt-15" rows="3" placeholder="Readonly Textarea" readonly>Readonly Textarea</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control mt-15" placeholder="Disabled Input Box" disabled>
                                            <select class="form-control custom-select mt-15" disabled>
                                                <option selected>Disabled Select</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <textarea class="form-control mt-15" id="exampleFormControlTextarea1" rows="3" placeholder="Disabled Textarea" disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
</div>
</div>
</div>

<?php  include('admin_footer.php'); ?>