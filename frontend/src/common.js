import axios from "axios";
export default {
  data() {
    return {};
  },
  methods: {
    async callApi(method = "get", url, dataObj, headerObj) {
      var baseURL = "https://evendor-api.muhajir.my.id/api/";
      try {
        let data = await axios({
          method: method,
          url: baseURL + url,
          data: dataObj,
          headers: headerObj,
        });

        return data;
      } catch (err) {
        return err.response;
      }
    },
  },
};
