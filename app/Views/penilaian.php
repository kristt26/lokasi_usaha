<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div ng-controller="penilaianController" ng-init="init()" ng-cloak>
    <h1 class="h3 mb-4 text-gray-800">{{setTitle}}</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <button class="btn btn-sm" ng-class="{'btn-info' : tampil== 'penilaian', 'btn-warning': tampil== 'manual'}" ng-click="perhitunganManual()">{{tampil=='manual' ? 'Tampilkan Pehitungan' : 'Tampilkan Penilaian'}}</button>
                </div>
                <div class="card-body">
                    <form ng-show="tampil=='penilaian'" ng-submit="save()">
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

                    <div ng-show="tampil=='manual'" class="table-responsive">
                        <h4>Matriks Keputusan</h4>
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th width="15%">Alternatif</th>
                                    <th ng-repeat="item in datas.kriteria">{{item.kode}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in manual.matriksKeputusan">
                                    <td>A{{$index+1}}</td>
                                    <!-- <td>{{item[$index]}}</td> -->
                                    <td ng-repeat="nilai in item track by $index">
                                        {{nilai}}
                                    </td>
                            </tbody>
                        </table>
                        <h4>Normalisasi Matriks Keputusan</h4>
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th width="15%">Alternatif</th>
                                    <th ng-repeat="item in datas.kriteria">{{item.kode}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in manual.matriksNormalisasi">
                                    <td>A{{$index+1}}</td>
                                    <!-- <td>{{item[$index]}}</td> -->
                                    <td ng-repeat="nilai in item track by $index">
                                        {{nilai | number: 3}}
                                    </td>
                            </tbody>
                        </table>
                        <h4>Nilai Optimasi</h4>
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>Alternatif</th>
                                    <th>Nilai Optimasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in manual.nilaiOptimasi track by $index">
                                    <td>A{{$index+1}}</td>
                                    <td>{{item | number: 4}}</td>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>