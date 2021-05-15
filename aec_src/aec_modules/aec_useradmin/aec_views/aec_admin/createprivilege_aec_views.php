
    <div class="col-12">

    <div class="row">

            <div class="col-12" id="listPrivilegeCreated" style="border:0px solid #DDD; overflow:auto;">
                <?=$listPrivilegeCreated ?? "..."?>
            </div>
            <div class="col-6" style="border:0px solid #DDD; overflow:auto;">
            </div>

            

            <div class="modal fade" id="showForm" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);" data-keyboard="false" tabindex="-1" aria-labelledby="showFormLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showFormLabel">
                            <i class="fa fa-database"></i> Creer un nouveau privilege
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    <?=$formCreatingPrivilege ?? "..."?>

                    </div>
                    </div>
                </div>
            </div>

    </div>

    </div>
