function default_Settings(){var s=config_data;s.enable_search||$(".search-container").hide(),"s-n"!=s.style&&$("[sgsr-shadow]").attr("sgsr-shadow",1),"s-r"==s.style&&$("[round-shadow]").attr("round-shadow",1),s.custom_scrollbar&&$("[sgsr-scroll]").attr("sgsr-scroll",1),s.header_color.includes("#")&&$("html").css("--sgsr-theme-pri",s.header_color),s.header_text_color.includes("#")&&$("html").css("--sgsr-theme-sec",s.header_text_color)}