const host = "https://provinces.open-api.vn/api/";

var callAPI = (api, select) => {
  return axios.get(api)
    .then((response) => {
      renderData(response.data, select);
    });
}

var callApiDistrict = (api) => {
  return axios.get(api)
    .then((response) => {
      renderData(response.data.districts, "district");
    });
}

var callApiWard = (api) => {
  return axios.get(api)
    .then((response) => {
      renderData(response.data.wards, "ward");
    });
}

var renderData = (array, select) => {
let placeholder = '';
let optionText = '';

switch (select) {
  case 'province':
    placeholder = 'Chọn tỉnh thành';
    optionText = 'Chọn tỉnh thành';
    break;
  case 'district':
    placeholder = 'Chọn quận/huyện';
    optionText = 'Chọn quận/huyện';
    break;
  case 'ward':
    placeholder = 'Chọn xã/phường';
    optionText = 'Chọn xã/phường';
    break;
  default:
    break;
}

let row = `<option disable value="">${placeholder}</option>`;
array.forEach(element => {
  row += `<option value="${element.code}">${element.name}</option>`;
});
$("#" + select).html(row);

// Update the first option text
$("#" + select + " option:first-child").text(optionText);
}


$(document).ready(function () {
  // Load initial data
  callAPI(host + "?depth=1", "province");

  $("#province").change(() => {
    const provinceCode = $("#province").val();
    if (provinceCode) {
      callApiDistrict(host + "p/" + provinceCode + "?depth=2");
    }
  });

  $("#district").change(() => {
    const districtCode = $("#district").val();
    if (districtCode) {
      callApiWard(host + "d/" + districtCode + "?depth=2");
    }
  });

  $("#ward").change(() => {
    printResult();
  });

  var printResult = () => {
    if ($("#district").val() != "" && $("#province").val() != "" &&
      $("#ward").val() != "") {
      let result = $("#province option:selected").text() +
        " | " + $("#district option:selected").text() + " | " +
        $("#ward option:selected").text();
      $("#result").text(result)
    }
  }
});