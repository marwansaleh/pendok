<div class="well well-lg">
    <form method="post" action="<?php echo site_url('service/main'); ?>">
        <div class="form-group">
            <label>Surat Dari</label>
            <select name="surat_dari" class="form-control">
                <?php foreach ($bidang as $bid): ?>
                <option value="<?php echo $bid->sandi; ?>"><?php echo $bid->nama; ?></option>
                <?php endforeach ; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tujuan</label>
            <select name="tipe_tujuan" class="form-control">
                <option value="internal">Internal</option>
                <option value="eksternal">Eksternal</option>
            </select>
        </div>
        <div class="form-group">
            <label>Nama Penerima</label>
            <input type="text" class="form-control" name="nama_penerima" maxlength="50">
        </div>
    </form>
</div>