<div id="container-generator">
    <div class="well well-lg">
        <form id="MyForm" method="post" action="<?php echo site_url('service/generator_nomor'); ?>">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label>Surat Dari</label>
                        <select name="bidang_pengirim" class="form-control">
                            <?php foreach ($bidang as $bid): ?>
                            <?php if ($bid->id==1) continue; ?>
                            <option value="<?php echo $bid->id; ?>"><?php echo $bid->nama; ?></option>
                            <?php endforeach ; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Persetujuan Direksi</label>
                        <select name="persetujuan_direksi" class="form-control">
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Tujuan</label>
                        <select name="tipe_tujuan" class="form-control">
                            <option value="internal">Internal</option>
                            <option value="eksternal">Eksternal</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label>Nama Penerima</label>
                        <input type="text" class="form-control" name="nama_penerima" maxlength="50">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Kode Perihal</label>
                        <select name="sandi_perihal" class="form-control">
                            <?php foreach ($perihal as $kategori => $pr): ?>
                            <optgroup label="<?php echo strtoupper($kategori); ?>">
                                <?php foreach ($pr as $p): ?>
                                <option value="<?php echo $p->id; ?>"><?php echo $p->perihal; ?></option>
                                <?php endforeach;?>
                            </optgroup>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Sifat Surat</label>
                        <select name="sifat_surat" class="form-control">
                            <option value="0">Normal</option>
                            <option value="1">Rahasia</option>
                            <option value="2">Sangat rahasia</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Perihal</label>
                <textarea class="form-control" name="perihal"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">Generate</button>
                <button type="reset" class="btn btn-default btn-lg">Reset</button>
            </div>
        </form>
    </div>
    <div class="well well-lg">
        <h2>
            <div class="form-group">
                <label>Nomor Surat</label>
                <div class="input-group">
                    <input type="text" class="form-control generated-nomor-surat" id="nomor-surat-copy" />
                    <div class="input-group-btn">
                        <button type="button" id="btn-copy" class="btn btn-default clipboard" data-clipboard-target="#nomor-surat-copy"><span class="fa fa-copy"></span></button>
                    </div>
                </div>
                
            </div>
        </h2>
    </div>
</div>


<script type="text/javascript">
    Generator = {
        init: function (){
            var _this = this;
            //set form validation
            $('form#MyForm').validate({
                ignore: [],
                rules: {
                    nama_penerima: {
                        required: true
                    },
                    perihal: {
                        required: true
                    }
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                submitHandler: function(form){
                    $(form).ajaxSubmit({
                        dataType: 'json',
                        success: function(data){
                            console.log(JSON.stringify(data));
                            _this.setNomorSurat(data.nomor_surat);
                        }
                    });
                }
            });
            
        },
        setNomorSurat: function(nomor){
            $('#container-generator').find('.generated-nomor-surat').val(nomor);
        },
    };
    $(document).ready(function(){
        Generator.init();
        $('#container-generator').on('change','input, select', function (){
            //Generator.setNomorSurat()
        });
        $('#btn-copy').on('click', function(){
            Generator.copyNomor2Clipboard();
        });
    });
</script>