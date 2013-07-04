hljs.LANGUAGES.cpp = function(a) {
    var b = {
	keyword : "false int float while private char catch export virtual operator sizeof dynamic_cast|10 typedef const_cast|10 const struct for static_cast|10 union namespace unsigned long throw volatile static protected bool template mutable if public friend do return goto auto void enum else break new extern using true class asm case typeid short reinterpret_cast|10 default double register explicit signed typename try this switch continue wchar_t inline delete alignof char16_t char32_t constexpr decltype noexcept nullptr static_assert thread_local restrict _Bool complex",
	built_in : "std string cin cout cerr clog stringstream istringstream ostringstream auto_ptr deque list queue stack vector map set bitset multiset multimap unordered_set unordered_map unordered_multiset unordered_multimap array shared_ptr"
    };
    return {
	k : b,
	i : "</",
	c : [
		a.CLCM,
		a.CBLCLM,
		a.QSM,
		{
		    cN : "string",
		    b : "'\\\\?.",
		    e : "'",
		    i : "."
		},
		{
		    cN : "number",
		    b : "\\b(\\d+(\\.\\d*)?|\\.\\d+)(u|U|l|L|ul|UL|f|F)"
		},
		a.CNM,
		{
		    cN : "preprocessor",
		    b : "#",
		    e : "$"
		},
		{
		    cN : "stl_container",
		    b : "\\b(deque|list|queue|stack|vector|map|set|bitset|multiset|multimap|unordered_map|unordered_set|unordered_multiset|unordered_multimap|array)\\s*<",
		    e : ">",
		    k : b,
		    r : 10,
		    c : [ "self" ]
		} ]
    }
}(hljs);

hljs.LANGUAGES.dos = function(a) {
    return {
	cI : true,
	k : {
	    flow : "if else goto for in do call exit not exist errorlevel defined equ neq lss leq gtr geq",
	    keyword : "shift cd dir echo setlocal endlocal set pause copy",
	    stream : "prn nul lpt3 lpt2 lpt1 con com4 com3 com2 com1 aux",
	    winutils : "ping net ipconfig taskkill xcopy ren del"
	},
	c : [ {
	    cN : "envvar",
	    b : "%%[^ ]"
	}, {
	    cN : "envvar",
	    b : "%[^ ]+?%"
	}, {
	    cN : "envvar",
	    b : "![^ ]+?!"
	}, {
	    cN : "number",
	    b : "\\b\\d+",
	    r : 0
	}, {
	    cN : "comment",
	    b : "@?rem",
	    e : "$"
	} ]
    }
}(hljs);

hljs.LANGUAGES.vbscript = function(a) {
    return {
	cI : true,
	k : {
	    keyword : "call class const dim do loop erase execute executeglobal exit for each next function if then else on error option explicit new private property let get public randomize redim rem select case set stop sub while wend with end to elseif is or xor and not class_initialize class_terminate default preserve in me byval byref step resume goto",
	    built_in : "lcase month vartype instrrev ubound setlocale getobject rgb getref string weekdayname rnd dateadd monthname now day minute isarray cbool round formatcurrency conversions csng timevalue second year space abs clng timeserial fixs len asc isempty maths dateserial atn timer isobject filter weekday datevalue ccur isdate instr datediff formatdatetime replace isnull right sgn array snumeric log cdbl hex chr lbound msgbox ucase getlocale cos cdate cbyte rtrim join hour oct typename trim strcomp int createobject loadpicture tan formatnumber mid scriptenginebuildversion scriptengine split scriptengineminorversion cint sin datepart ltrim sqr scriptenginemajorversion time derived eval date formatpercent exp inputbox left ascw chrw regexp server response request cstr err",
	    literal : "true false null nothing empty"
	},
	i : "//",
	c : [ a.inherit(a.QSM, {
	    c : [ {
		b : '""'
	    } ]
	}), {
	    cN : "comment",
	    b : "'",
	    e : "$"
	}, a.CNM ]
    }
}(hljs);

hljs.LANGUAGES.javascript = function(a) {
    return {
	k : {
	    keyword : "in if for while finally var new function do return void else break catch instanceof with throw case default try this switch continue typeof delete let yield const",
	    literal : "true false null undefined NaN Infinity"
	},
	c : [ a.ASM, a.QSM, a.CLCM, a.CBLCLM, a.CNM, {
	    b : "(" + a.RSR + "|\\b(case|return|throw)\\b)\\s*",
	    k : "return throw case",
	    c : [ a.CLCM, a.CBLCLM, {
		cN : "regexp",
		b : "/",
		e : "/[gim]*",
		i : "\\n",
		c : [ {
		    b : "\\\\/"
		} ]
	    }, {
		b : "<",
		e : ">;",
		sL : "xml"
	    } ],
	    r : 0
	}, {
	    cN : "function",
	    bWK : true,
	    e : "{",
	    k : "function",
	    c : [ {
		cN : "title",
		b : "[A-Za-z$_][0-9A-Za-z$_]*"
	    }, {
		cN : "params",
		b : "\\(",
		e : "\\)",
		c : [ a.CLCM, a.CBLCLM ],
		i : "[\"'\\(]"
	    } ],
	    i : "\\[|%"
	} ]
    }
}(hljs);

hljs.LANGUAGES.css = function(a) {
    var b = {
	cN : "function",
	b : a.IR + "\\(",
	e : "\\)",
	c : [ a.NM, a.ASM, a.QSM ]
    };
    return {
	cI : true,
	i : "[=/|']",
	c : [ a.CBLCLM, {
	    cN : "id",
	    b : "\\#[A-Za-z0-9_-]+"
	}, {
	    cN : "class",
	    b : "\\.[A-Za-z0-9_-]+",
	    r : 0
	}, {
	    cN : "attr_selector",
	    b : "\\[",
	    e : "\\]",
	    i : "$"
	}, {
	    cN : "pseudo",
	    b : ":(:)?[a-zA-Z0-9\\_\\-\\+\\(\\)\\\"\\']+"
	}, {
	    cN : "at_rule",
	    b : "@(font-face|page)",
	    l : "[a-z-]+",
	    k : "font-face page"
	}, {
	    cN : "at_rule",
	    b : "@",
	    e : "[{;]",
	    eE : true,
	    k : "import page media charset",
	    c : [ b, a.ASM, a.QSM, a.NM ]
	}, {
	    cN : "tag",
	    b : a.IR,
	    r : 0
	}, {
	    cN : "rules",
	    b : "{",
	    e : "}",
	    i : "[^\\s]",
	    r : 0,
	    c : [ a.CBLCLM, {
		cN : "rule",
		b : "[^\\s]",
		rB : true,
		e : ";",
		eW : true,
		c : [ {
		    cN : "attribute",
		    b : "[A-Z\\_\\.\\-]+",
		    e : ":",
		    eE : true,
		    i : "[^\\s]",
		    starts : {
			cN : "value",
			eW : true,
			eE : true,
			c : [ b, a.NM, a.QSM, a.ASM, a.CBLCLM, {
			    cN : "hexcolor",
			    b : "\\#[0-9A-F]+"
			}, {
			    cN : "important",
			    b : "!important"
			} ]
		    }
		} ]
	    } ]
	} ]
    }
}(hljs);

hljs.LANGUAGES.xml = function(a) {
    var c = "[A-Za-z0-9\\._:-]+";
    var b = {
	eW : true,
	c : [ {
	    cN : "attribute",
	    b : c,
	    r : 0
	}, {
	    b : '="',
	    rB : true,
	    e : '"',
	    c : [ {
		cN : "value",
		b : '"',
		eW : true
	    } ]
	}, {
	    b : "='",
	    rB : true,
	    e : "'",
	    c : [ {
		cN : "value",
		b : "'",
		eW : true
	    } ]
	}, {
	    b : "=",
	    c : [ {
		cN : "value",
		b : "[^\\s/>]+"
	    } ]
	} ]
    };
    return {
	cI : true,
	c : [ {
	    cN : "pi",
	    b : "<\\?",
	    e : "\\?>",
	    r : 10
	}, {
	    cN : "doctype",
	    b : "<!DOCTYPE",
	    e : ">",
	    r : 10,
	    c : [ {
		b : "\\[",
		e : "\\]"
	    } ]
	}, {
	    cN : "comment",
	    b : "<!--",
	    e : "-->",
	    r : 10
	}, {
	    cN : "cdata",
	    b : "<\\!\\[CDATA\\[",
	    e : "\\]\\]>",
	    r : 10
	}, {
	    cN : "tag",
	    b : "<style(?=\\s|>|$)",
	    e : ">",
	    k : {
		title : "style"
	    },
	    c : [ b ],
	    starts : {
		e : "</style>",
		rE : true,
		sL : "css"
	    }
	}, {
	    cN : "tag",
	    b : "<script(?=\\s|>|$)",
	    e : ">",
	    k : {
		title : "script"
	    },
	    c : [ b ],
	    starts : {
		e : "<\/script>",
		rE : true,
		sL : "javascript"
	    }
	}, {
	    b : "<%",
	    e : "%>",
	    sL : "vbscript"
	}, {
	    cN : "tag",
	    b : "</?",
	    e : "/?>",
	    c : [ {
		cN : "title",
		b : "[^ />]+"
	    }, b ]
	} ]
    }
}(hljs);

hljs.LANGUAGES.java = function(a) {
    return {
	k : "false synchronized int abstract float private char boolean static null if const for true while long throw strictfp finally protected import native final return void enum else break transient new catch instanceof byte super volatile case assert short package default double public try this switch continue throws",
	c : [ {
	    cN : "javadoc",
	    b : "/\\*\\*",
	    e : "\\*/",
	    c : [ {
		cN : "javadoctag",
		b : "@[A-Za-z]+"
	    } ],
	    r : 10
	}, a.CLCM, a.CBLCLM, a.ASM, a.QSM, {
	    cN : "class",
	    bWK : true,
	    e : "{",
	    k : "class interface",
	    i : ":",
	    c : [ {
		bWK : true,
		k : "extends implements",
		r : 10
	    }, {
		cN : "title",
		b : a.UIR
	    } ]
	}, a.CNM, {
	    cN : "annotation",
	    b : "@[A-Za-z]+"
	} ]
    }
}(hljs);

hljs.LANGUAGES.php = function(a) {
    var e = {
	cN : "variable",
	b : "\\$+[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*"
    };
    var b = [ a.inherit(a.ASM, {
	i : null
    }), a.inherit(a.QSM, {
	i : null
    }), {
	cN : "string",
	b : 'b"',
	e : '"',
	c : [ a.BE ]
    }, {
	cN : "string",
	b : "b'",
	e : "'",
	c : [ a.BE ]
    } ];
    var c = [ a.BNM, a.CNM ];
    var d = {
	cN : "title",
	b : a.UIR
    };
    return {
	cI : true,
	k : "and include_once list abstract global private echo interface as static endswitch array null if endwhile or const for endforeach self var while isset public protected exit foreach throw elseif include __FILE__ empty require_once do xor return implements parent clone use __CLASS__ __LINE__ else break print eval new catch __METHOD__ case exception php_user_filter default die require __FUNCTION__ enddeclare final try this switch continue endfor endif declare unset true false namespace trait goto instanceof insteadof __DIR__ __NAMESPACE__ __halt_compiler",
	c : [ a.CLCM, a.HCM, {
	    cN : "comment",
	    b : "/\\*",
	    e : "\\*/",
	    c : [ {
		cN : "phpdoc",
		b : "\\s@[A-Za-z]+"
	    } ]
	}, {
	    cN : "comment",
	    eB : true,
	    b : "__halt_compiler.+?;",
	    eW : true
	}, {
	    cN : "string",
	    b : "<<<['\"]?\\w+['\"]?$",
	    e : "^\\w+;",
	    c : [ a.BE ]
	}, {
	    cN : "preprocessor",
	    b : "<\\?php",
	    r : 10
	}, {
	    cN : "preprocessor",
	    b : "\\?>"
	}, e, {
	    cN : "function",
	    bWK : true,
	    e : "{",
	    k : "function",
	    i : "\\$|\\[|%",
	    c : [ d, {
		cN : "params",
		b : "\\(",
		e : "\\)",
		c : [ "self", e, a.CBLCLM ].concat(b).concat(c)
	    } ]
	}, {
	    cN : "class",
	    bWK : true,
	    e : "{",
	    k : "class",
	    i : "[:\\(\\$]",
	    c : [ {
		bWK : true,
		eW : true,
		k : "extends",
		c : [ d ]
	    }, d ]
	}, {
	    b : "=>"
	} ].concat(b).concat(c)
    }
}(hljs);

hljs.LANGUAGES.sql = function(a) {
    return {
	cI : true,
	c : [
		{
		    cN : "operator",
		    b : "(begin|start|commit|rollback|savepoint|lock|alter|create|drop|rename|call|delete|do|handler|insert|load|replace|select|truncate|update|set|show|pragma|grant)\\b(?!:)",
		    e : ";",
		    eW : true,
		    k : {
			keyword : "all partial global month current_timestamp using go revoke smallint indicator end-exec disconnect zone with character assertion to add current_user usage input local alter match collate real then rollback get read timestamp session_user not integer bit unique day minute desc insert execute like ilike|2 level decimal drop continue isolation found where constraints domain right national some module transaction relative second connect escape close system_user for deferred section cast current sqlstate allocate intersect deallocate numeric public preserve full goto initially asc no key output collation group by union session both last language constraint column of space foreign deferrable prior connection unknown action commit view or first into float year primary cascaded except restrict set references names table outer open select size are rows from prepare distinct leading create only next inner authorization schema corresponding option declare precision immediate else timezone_minute external varying translation true case exception join hour default double scroll value cursor descriptor values dec fetch procedure delete and false int is describe char as at in varchar null trailing any absolute current_time end grant privileges when cross check write current_date pad begin temporary exec time update catalog user sql date on identity timezone_hour natural whenever interval work order cascade diagnostics nchar having left call do handler load replace truncate start lock show pragma exists number",
			aggregate : "count sum min max avg"
		    },
		    c : [ {
			cN : "string",
			b : "'",
			e : "'",
			c : [ a.BE, {
			    b : "''"
			} ],
			r : 0
		    }, {
			cN : "string",
			b : '"',
			e : '"',
			c : [ a.BE, {
			    b : '""'
			} ],
			r : 0
		    }, {
			cN : "string",
			b : "`",
			e : "`",
			c : [ a.BE ]
		    }, a.CNM ]
		}, a.CBLCLM, {
		    cN : "comment",
		    b : "--",
		    e : "$"
		} ]
    }
}(hljs);



