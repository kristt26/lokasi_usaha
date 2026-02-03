<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div ng-controller="laporanController" ng-init="hitung()">
    <h1 class="h3 mb-4 text-gray-800">{{setTitle}}</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive" ng-show="datas.alternatif.length>0">
                        <table class="table pmd-table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Desc</th>
                                    <th>Nilai Optimasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas.alternatif | limitTo: 3">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.kode}}</td>
                                    <td>{{item.nama}}</td>
                                    <td>{{item.desc}}</td>
                                    <td>{{item.preferensi}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>