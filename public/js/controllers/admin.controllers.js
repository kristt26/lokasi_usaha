angular
  .module("adminctrl", [])
  // Admin
  .controller("dashboardController", dashboardController)
  .controller("periodeController", periodeController)
  .controller("kriteriaController", kriteriaController)
  .controller("alternatifController", alternatifController)
  .controller("penilaianController", penilaianController)
  .controller("laporanController", laporanController);

function dashboardController($scope, dashboardServices) {
  $scope.setTitle = "Dashboard";
  $scope.$emit("SendUp", $scope.setTitle);
  $scope.datas = {};
  $scope.paragraph =
    "Sistem penjurusan menggunakan metode Moora pada SMA .....";
  // dashboardServices.get().then(res=>{
  //     $scope.datas = res;
  // })
}

function periodeController($scope, periodeServices, pesan, helperServices) {
  $scope.setTitle = "Periode";
  $scope.$emit("SendUp", $scope.setTitle);
  $scope.datas = {};
  $scope.model = {};
  periodeServices.get().then((res) => {
    $scope.datas = res;
  });
  $scope.save = () => {
    pesan.dialog("Yakin ingin?", "Yes", "Tidak").then((res) => {
      if ($scope.model.id) {
        periodeServices.put($scope.model).then((res) => {
          $scope.model = {};
          pesan.Success("Berhasil mengubah data");
        });
      } else {
        periodeServices.post($scope.model).then((res) => {
          $scope.model = {};
          pesan.Success("Berhasil menambah data");
        });
      }
    });
  };

  $scope.edit = (item) => {
    $scope.model = angular.copy(item);
    document.getElementById("periode").focus();
  };

  $scope.delete = (param) => {
    pesan.dialog("Yakin ingin?", "Ya", "Tidak").then((res) => {
      klasifikasiServices.deleted(param).then((res) => {
        pesan.Success("Berhasil menghapus data");
      });
    });
  };

  $scope.subKlasifikasi = (param) => {
    document.location.href =
      helperServices.url + "admin/sub_klasifikasi/data/" + param.id;
  };
}

function kriteriaController(
  $scope,
  kriteriaServices,
  pesan,
  helperServices,
  RangeServices
) {
  $scope.setTitle = "Kriteria";
  $scope.$emit("SendUp", $scope.setTitle);
  $scope.datas = {};
  $scope.model = {};
  kriteriaServices.get().then((res) => {
    $scope.datas = res;
  });
  $scope.save = () => {
    pesan.dialog("Yakin ingin?", "Yes", "Tidak").then((res) => {
      if ($scope.model.id) {
        kriteriaServices.put($scope.model).then((res) => {
          $scope.model = {};
          pesan.Success("Berhasil mengubah data");
        });
      } else {
        kriteriaServices.post($scope.model).then((res) => {
          $scope.model = {};
          pesan.Success("Berhasil menambah data");
        });
      }
    });
  };

  $scope.edit = (item) => {
    item.bobot = parseInt(item.bobot);
    $scope.model = angular.copy(item);
    // document.getElementById("nama").focus();
  };

  $scope.showRange = (param) => {
    $.LoadingOverlay("show");
    setTimeout(() => {
      $.LoadingOverlay("hide");
      $scope.$applyAsync((x) => {
        $scope.kriteria = param;
        $scope.model.kriteria_id = $scope.kriteria.id;
        $scope.setTitle = "Indikator";
      });
    }, 200);
  };

  $scope.saveRange = () => {
    pesan.dialog("Yakin ingin?", "Yes", "Tidak").then((res) => {
      if ($scope.model.id) {
        RangeServices.put($scope.model).then((res) => {
          $scope.model = {};
          pesan.Success("Berhasil mengubah data");
        });
      } else {
        RangeServices.post($scope.model).then((res) => {
          $scope.model.id = res;
          $scope.kriteria.range.push($scope.model);
          $scope.model = {};
          $scope.model.kriteria_id = $scope.kriteria.id;
          pesan.Success("Berhasil menambah data");
        });
      }
    });
  };

  $scope.delete = (param) => {
    pesan.dialog("Yakin ingin?", "Ya", "Tidak").then((res) => {
      kriteriaServices.deleted(param).then((res) => {
        pesan.Success("Berhasil menghapus data");
      });
    });
  };
  $scope.deleteRange = (param) => {
    pesan.dialog("Yakin ingin?", "Ya", "Tidak").then((res) => {
      RangeServices.deleted(param).then((res) => {
        var index = $scope.kriteria.range.indexOf(param);
        $scope.kriteria.range.splice(index, 1);
        pesan.Success("Berhasil menghapus data");
      });
    });
  };
  $scope.back = () => {
    $.LoadingOverlay("show");
    setTimeout(() => {
      $.LoadingOverlay("hide");
      $scope.$applyAsync((x) => {
        $scope.kriteria = {};
        $scope.setTitle = "Kriteria";
      });
    }, 200);
  };
}

function alternatifController(
  $scope,
  alternatifServices,
  kriteriaServices,
  pesan,
  helperServices
) {
  $scope.setTitle = "Lokasi";
  $scope.$emit("SendUp", $scope.setTitle);
  $scope.datas = {};
  $scope.model = {};
  $scope.photo = {};
  $scope.photos = [];
  $scope.setShow = "alternatif";
  alternatifServices.get().then((res) => {
    $scope.datas = res;
    console.log(res);
  });
  $scope.save = () => {
    pesan.dialog("Yakin ingin?", "Yes", "Tidak").then((res) => {
      if ($scope.model.id) {
        alternatifServices.put($scope.model).then((res) => {
          $scope.model = {};
          pesan.Success("Berhasil mengubah data");
          tinymce.get("fasilitas").setContent("");
        });
      } else {
        alternatifServices.post($scope.model).then((res) => {
          $scope.model = {};
          pesan.Success("Berhasil menambah data");
          tinymce.get("fasilitas").setContent("");
        });
      }
    });
  };

  $scope.edit = (item) => {
    item.bobot = parseInt(item.bobot);
    $scope.model = angular.copy(item);
    // tinymce.get("fasilitas").setContent(item.fasilitas ?? "");
  };

  $scope.delete = (param) => {
    pesan.dialog("Yakin ingin?", "Ya", "Tidak").then((res) => {
      alternatifServices.deleted(param).then((res) => {
        pesan.Success("Berhasil menghapus data");
      });
    });
  };
}

function laporanController(
  $scope,
  periodeServices,
  pesan,
  helperServices,
  laporanServices
) {
  $scope.setTitle = "Hasil Perhitungan";
  $scope.$emit("SendUp", $scope.setTitle);
  $scope.datas = {};
  $scope.periodes = {};
  $scope.model = {};
  $scope.hitung = (param) => {
    laporanServices.hitung(param).then((res) => {
      $scope.datas = res;
      console.log(res);
    });
  };
}

function penilaianController($scope, penilaianServices, pesan, helperServices) {
  $scope.setTitle = "Penilaian";
  $scope.$emit("SendUp", $scope.setTitle);
  $scope.datas = {};
  $scope.model = {};
  penilaianServices.get().then((res) => {
    $scope.datas = res;
    $scope.mapData();
    console.log($scope.datas.alternatif);
  });
  $scope.mapData = () => {
    $scope.datas.alternatif.forEach((element) => {
      element.kriterias = angular.copy($scope.datas.kriteria);
      element.nilai.forEach((nilai) => {
        element.kriterias.forEach((kri) => {
          if (nilai.kriteria_id == kri.id) {
            kri.nilai = nilai.bobot;
            kri.pref_id = nilai.id;
          }
        });
      });
    });
  };
  $scope.save = () => {
    pesan.dialog("Yakin ingin?", "Yes", "Tidak").then((res) => {
      penilaianServices.post($scope.datas.alternatif).then((res) => {
        // $scope.model = {};
        $scope.datas.alternatif = res;
        pesan.Success("Berhasil menambah data");
        $scope.mapData();
      });
    });
  };

  $scope.delete = (param) => {
    pesan.dialog("Yakin ingin?", "Ya", "Tidak").then((res) => {
      klasifikasiServices.deleted(param).then((res) => {
        pesan.Success("Berhasil menghapus data");
      });
    });
  };
}
