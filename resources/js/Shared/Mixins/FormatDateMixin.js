import moment from "moment";

export default {
    methods: {
        format_date: function (date, format = "YYYY MMM DD") {
            return moment(date).format(format);
        },
    },
};
