<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div ng-controller="alternatifController">
    <h1 class="h3 mb-4 text-gray-800">{{setTitle}}</h1>
    <div class="row" ng-show="setShow=='alternatif'">
        <div class="col-md-4">
            <div class="card">
                <form ng-submit="save()">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="control-label">Nama Lokasi</label>
                            <input type="text" class="form-control form-control-sm" id="nama" ng-model="model.nama" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kode</label>
                            <input type="text" class="form-control form-control-sm" id="kode" ng-model="model.kode" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Deskripsi</label>
                            <textarea id="desc" class="form-control form-control-sm" rows="5" ng-model="model.desc" required></textarea>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary pmd-ripple-effect btn-sm">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- <table datatable="ng" class="table pmd-table table-sm"> -->
                        <table class="table pmd-table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Lokasi</th>
                                    <!-- <th>Bobot</th>
                                        <th>Type</th> -->
                                    <th width="30%"><i class="fa fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.kode}}</td>
                                    <td>{{item.nama}}</td>
                                    <!-- <td>{{item.bobot}}</td>
                                        <td>{{item.type}}</td> -->
                                    <td>
                                        <button type="submit" class="btn btn-warning pmd-ripple-effect btn-sm" ng-click="edit(item)"><i class="fa fa-edit fa-sm fa-fw"></i></button>
                                        <button type="submit" class="btn btn-danger pmd-ripple-effect btn-sm" ng-click="delete(item)"><i class="fa fa-trash fa-sm fa-fw"></i></button>
                                        <!-- <a ng-href="/assets/berkas/{{item.lokasi}}" target="_blank" data-toggle="tooltip" title="Buka foto" tooltip class="btn btn-primary btn-sm"><i class="fas fa-images"></i></a> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<style>
    .gallery-item {
        position: relative;
        overflow: hidden;
    }
    .gallery-item img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        cursor: pointer;
    }

    .btn-group {
        position: absolute;
        bottom: 10px;
        right: 10px;
        display: none;
    }

    .checkbox-select {
        position: absolute;
        top: 10px;
        right: 10px;
        display: none;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 5px;
        border-radius: 50%;
    }

    .checkbox-select input {
        cursor: pointer;
    }

    .btn-group button {
        color: #fff;
        border: none;
        padding: 5px 10px;
        margin-left: 5px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        background-color: rgba(0, 123, 255, 0.7);
        /* Transparent Blue */
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-edit {
        background-color: rgba(0, 123, 255, 0.7);
    }

    .btn-edit:hover {
        background-color: rgba(0, 123, 255, 1);
        transform: scale(1.1);
    }

    .btn-delete {
        background-color: rgba(220, 53, 69, 0.7);
    }

    .btn-delete:hover {
        background-color: rgba(220, 53, 69, 1);
        transform: scale(1.1);
    }

    .gallery-item:hover .btn-group,
    .gallery-item:hover .checkbox-select {
        display: flex;
    }
</style>
<?= $this->endSection() ?>