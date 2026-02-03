<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div ng-controller="penilaianController">
    <h1 class="h3 mb-4 text-gray-800">{{setTitle}}</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form ng-submit="save()">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th width="15%">Lokasi</th>
                                        <th ng-repeat="item in datas.kriteria">{{item.nama}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in datas.alternatif">
                                        <td>{{$index+1}}</td>
                                        <td>{{item.nama}}</td>
                                        <td ng-repeat="kri in item.kriterias">
                                            <select class="form-control" ng-model="kri.nilai" required>
                                                <option value="">--- Pilih nilai ---</option>
                                                <option ng-repeat="n in kri.range" value="{{n.bobot}}">{{n.indikator}}</option>
                                            </select>
                                        </td>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary pmd-ripple-effect btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>