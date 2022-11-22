var Helper = {
    isEmpty: function (param) {
        return /^$/.test(param);
    },
    isOnlyLetters: function (param) {
        return /[a-zA-ZáéíóúÁÉÍÓÚñÑ]+/.test(param);
    },
    isOnlyNumbers: function (param) {
        return /[0-9]+/.test(param);
    },
    isAlphaNumeric: function (param) {
        return /[0-9a-zA-Z]+/.test(param);
    },
    isVarchar: function (param) {
        return /\w+/.test(param);
    },
    isInteger: function () {
        return /^-?[0-9]+$/
    },
    isFloat: function (param) {
        var pattern1 = "/^-?[0-9]+(\.[0-9]+)?$/";
        var pattern2 = "/^-?[0-9]+(,[0-9]+)?$/";
        var pattern3 = "/^-?[0-9]{1,3}(,[0-9]{3})*(\.[0-9]+)?$/";
        var pattern4 = "/^-?[0-9]{1,3}(\.[0-9]{3})*(,[0-9]+)?$/";

        if (pattern1.test(param)) {
            return true;
        }

        if (pattern2.test(param)) {
            return true;
        }

        if (pattern3.test(param)) {
            return true;
        }

        if (pattern4.test(param)) {
            return true;
        }

        return false;
    },
    isDouble: function(param)
	{
		pattern1 = "/^-?[0-9]+(\.[0-9]+)?$/";
		pattern2 = "/^-?[0-9]+(,[0-9]+)?$/";
		pattern3 = "/^-?[0-9]{1,3}(,[0-9]{3})*(\.[0-9]+)?$/";
		pattern4 = "/^-?[0-9]{1,3}(\.[0-9]{3})*(,[0-9]+)?$/";

		if (pattern1.test(param)) {
			return true;
		}

		if (pattern2.test(param)) {
			return true;
		}

		if (pattern3.test(param)) {
			return true;
		}

		if (pattern4.test(param)) {
			return true;
		}

		return false;
	},
    esMenorQue: function(param, min){
        return param < min;
    },
    esMayorQue: function(param, max){
        return param > max;
    },
    estaEntre: function(param, min, max){
        return (param >= min && param <= max)
    },
    longitudMenorA: function (param, min){
        return param.length < min;
    },
    longitudMayorA: function(param, max){
        return param.length > max;
    },
    longitudEstaEntre: function (param, min, max){
        return param.length >= min && param.length <= max;
    },
    esFechaValida: function(param){
        pattern1 = /^(?<y>[0-9]{2,4})(\/|-|.)(?<m>[0-9]{1,2})(\/|-|.)(?<d>[0-9]{1,2})$/;
        pattern2 = /^(?<d>[0-9]{1,2})(\/|-|.)(?<m>[0-9]{1,2})(\/|-|.)(?<y>[0-9]{2,4})$/;

        date = array();

        if(match = pattern1.match(param)){
            date = match;
        }

        if(match = pattern2.match(param)){
            date = match;
        }

        if(date.isEmpty()){
            return false;
        }

        y = data["y"];
        m = data["m"];
        d = data["d"];

        var nDate = new Date(y, m, d);

        y = parseInt(y);
        m = parseInt(m);
        d = parseInt(d);

        return (nDate.getFullYear() === y && nDate.getMonth() === m && nDate.getDate() === d);
    },
    esTiempoValido: function (param)
	{
		pattern1 = /^(?<h>[0-9]{2}):(?<i>[0-9]{2}):(?<s>[0-9]{2})$/;
		pattern2 = /^(?<h>[0-9]{2}):(?<i>[0-9]{2})\s(am|AM|pm|PM)$/;

		if (time = pattern1.match(param)) {
			h = time["h"];
			i = time["i"];
			s = time["s"];

			if (h < 24 && i < 60 && s < 60) {
				return true;
			}
		}

		if (time = pattern2.match(param)) {
			h = time["h"];
			i = time["i"];

			if (h <= 12 && i <= 59) {
				return true;
			}
		}

		return false;
	},
    esFechaTiempoValido: function(param)
	{
		pattern = /^(?<date>[0-9]{4}-[0-9]{2}-[0-9]{2})\s(?<time>[0-9]{2}:[0-9]{2}:[0-9]{2})$/;

		if (match = pattern.match(param)) {
			date = match["date"];
			time = match["time"];

			if (this.isDate(date) && this.isTime(time)) {
				return true;
			}
		}

		return false;
	},
    darFormatoFechaStd: function (param)
	{
		pattern1 = /^(?<y>[0-9]{2,4})(\/|-|.)(?<m>[0-9]{1,2})(\/|-|.)(?<d>[0-9]{1,2})$/;
		pattern2 = /^(?<d>[0-9]{1,2})(\/|-|.)(?<m>[0-9]{1,2})(\/|-|.)(?<y>[0-9]{2,4})$/;

		date = array();

		if (match = pattern1.match(param)) {
			date = match;
		}

		if (match = pattern2.match(param)) {
			date = match;
		}

		if (date.isEmpty()) {
            return false;
        }
    
        y = date["y"];
        m = date["m"];
        d = date["d"];

        var nDate = new Date(y, m, d);

        if(y.getFullYear() === y && m.getMonth() === m && d.getDate() === d){
            return y + "-" + m + "-" + d;
        }

        return false;
	},
    darFormatoCantidadStd: function (param)
	{
		pattern1 = /^-?[0-9]+(\.[0-9]+)?$/;
		pattern2 = /^-?[0-9]+((?<split>,)[0-9]+)?$/;
		pattern3 = /^-?[0-9]{1,3}((?<split>,)[0-9]{3})*(\.[0-9]+)?$/;
		pattern4 = /^-?[0-9]{1,3}((?<split1>\.)[0-9]{3})*((?<split2>,)[0-9]+)?$/;

		if (match = pattern1.match(param)) {
			return param;
		}

		if (match = pattern2.match(param)) {
			return param.replace($match["split"], ".");
		}

		if (match = pattern3.match(param)) {
			return param.replace($match["split"], "");
		}

		if (match = pattern4.match(param)) {
			param = param.replace($match["split1"], "");
			param = param.replace($match["split2"], ".");
			return param;
		}

		return false;
	},
    darFormatoStdCantidad: function (param, decimals = 2)
	{
		return parseFloat(param).toFixed(decimals);
	},
	darFormatoCorrelativo: function (param, length)
	{
		return param.padStar(length, 0);
	},
    inputOnlyLetters: function (id) {
        $(id).keypress(function (e) {
            if (/[^a-zA-Z]/.test(e.key)) {
                e.preventDefault();
                return false;
            }
        });
    },
    inputOnlyCedula: function (id) {
        $(id).keypress(function (e) {
            if (/[^0-9]/.test(e.key) || e.target.value.length > 8) {
                e.preventDefault();
                return false;
            }
        });
    },

};