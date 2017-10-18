export default {
	show(type, message) {
		switch(type) {
			case "success":
				toastr.success(message)
			break;
			case "warning":
				toastr.warning(message)
			break;
			case "error":
				toastr.error(message)
			break;
		}
	}
}