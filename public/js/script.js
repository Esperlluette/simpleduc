function session_id() {
    return /SESS\w*ID=([^;]+)/i.test(document.cookie) ? RegExp.$1 : false;
}