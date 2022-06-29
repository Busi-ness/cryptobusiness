
<?php


switch($userpays){
                    case "Benin":
                    $isop = "bj";
                    break;

                    case "Cote_d_Ivoire":
                    $isop = "ci";
                    break;

                    case "Burkina_Faso":
                    $isop = "bf";
                    break;
                    
                    
                    default:
                    $isop = "bj";

                }

/*Pays	ISO 3166-1 alpha-2	ISO 3166-1 alpha-3	ISO 3166-1 numérique
Afghanistan	AF	AFG	4
Îles Åland	AX	ALA	248
Albanie	AL	ALB	8
Algérie	DZ	DZA	12
Samoa américaines	AS	ASM	16
Andorre	AD	AND	20
Angola	AO	AGO	24
Anguilla	AI	AIA	660
Antarctique	AQ	ATA	10
Antigua-et-Barbuda	AG	ATG	28
Argentine	AR	ARG	32
Arménie	AM	ARM	51
Aruba	AW	ABW	533
Australie	AU	AUS	36
Autriche	AT	AUT	40
Azerbaïdjan	AZ	AZE	31
Bahamas	BS	BHS	44
Bahreïn	BH	BHR	48
Bangladesh	BD	BGD	50
Barbade	BB	BRB	52
Biélorussie	BY	BLR	112
Belgique	BE	BEL	56
Belize	BZ	BLZ	84
Bénin	BJ	BEN	204
Bermudes	BM	BMU	60
Bhoutan	BT	BTN	64
Bolivie	BO	BOL	68
Bosnie-Herzégovine	BA	BIH	70
Botswana	BW	BWA	72
Île Bouvet	BV	BVT	74
Brésil	BR	BRA	76
British Virgin Islands	VG	VGB	92
Territoire britannique de l’Océan Indien	IO	IOT	86
Brunei Darussalam	BN	BRN	96
Bulgarie	BG	BGR	100
Burkina Faso	BF	BFA	854
Burundi	BI	BDI	108
Cambodge	KH	KHM	116
Cameroun	CM	CMR	120
Canada	CA	CAN	124
Cap-Vert	CV	CPV	132
Iles Cayman	KY	CYM	136
République centrafricaine	CF	CAF	140
Tchad	TD	TCD	148
Chili	CL	CHL	152
Chine	CN	CHN	156
Hong Kong	HK	HKG	344
Macao	MO	MAC	446
Île Christmas	CX	CXR	162
Îles Cocos	CC	CCK	166
Colombie	CO	COL	170
Comores	KM	COM	174
République du Congo	CG	COG	178
République démocratique du Congo	CD	COD	180
Îles Cook	CK	COK	184
Costa Rica	CR	CRI	188
Côte d’Ivoire	CI	CIV	384
Croatie	HR	HRV	191
Cuba	CU	CUB	192
Chypre	CY	CYP	196
République tchèque	CZ	CZE	203
Danemark	DK	DNK	208
Djibouti	DJ	DJI	262
Dominique	DM	DMA	212
République dominicaine	DO	DOM	214
Équateur	EC	ECU	218
Égypte	EG	EGY	818
Salvador	SV	SLV	222
Guinée équatoriale	GQ	GNQ	226
Érythrée	ER	ERI	232
Estonie	EE	EST	233
Éthiopie	ET	ETH	231
Îles Falkland	FK	FLK	238
Îles Féroé	FO	FRO	234
Fidji	FJ	FJI	242
Finlande	FI	FIN	246
France	FR	FRA	250
Guyane française	GF	GUF	254
Polynésie française	PF	PYF	258
Terres australes et antarctiques françaises	TF	ATF	260
Gabon	GA	GAB	266
Gambie	GM	GMB	270
Géorgie	GE	GEO	268
Allemagne	DE	DEU	276
Ghana	GH	GHA	288
Gibraltar	GI	GIB	292
Grèce	GR	GRC	300
Groenland	GL	GRL	304
Grenade	GD	GRD	308
Guadeloupe	GP	GLP	312
Guam	GU	GUM	316
Guatemala	GT	GTM	320
Guernesey	GG	GGY	831
Guinée	GN	GIN	324
Guinée-Bissau	GW	GNB	624
Guyane	GY	GUY	328
Haïti	HT	HTI	332
Îles Heard-et-MacDonald	HM	HMD	334
Saint-Siège (Vatican)	VA	VAT	336
Honduras	HN	HND	340
Hongrie	HU	HUN	348
Islande	IS	ISL	352
Inde	IN	IND	356
Indonésie	ID	IDN	360
Iran	IR	IRN	364
Irak	IQ	IRQ	368
Irlande	IE	IRL	372
Ile de Man	IM	IMN	833
Israël	IL	ISR	376
Italie	IT	ITA	380
Jamaïque	JM	JAM	388
Japon	JP	JPN	392
Jersey	JE	JEY	832
Jordanie	JO	JOR	400
Kazakhstan	KZ	KAZ	398
Kenya	KE	KEN	404
Kiribati	KI	KIR	296
Corée du Nord	KP	PRK	408
Corée du Sud	KR	KOR	410
Koweït	KW	KWT	414
Kirghizistan	KG	KGZ	417
Laos	LA	LAO	418
Lettonie	LV	LVA	428
Liban	LB	LBN	422
Lesotho	LS	LSO	426
Libéria	LR	LBR	430
Libye	LY	LBY	434
Liechtenstein	LI	LIE	438
Lituanie	LT	LTU	440
Luxembourg	LU	LUX	442
Macédoine	MK	MKD	807
Madagascar	MG	MDG	450
Malawi	MW	MWI	454
Malaisie	MY	MYS	458
Maldives	MV	MDV	462
Mali	ML	MLI	466
Malte	MT	MLT	470
Îles Marshall	MH	MHL	584
Martinique	MQ	MTQ	474
Mauritanie	MR	MRT	478
Maurice	MU	MUS	480
Mayotte	YT	MYT	175
Mexique	MX	MEX	484
Micronésie	FM	FSM	583
Moldavie	MD	MDA	498
Monaco	MC	MCO	492
Mongolie	MN	MNG	496
Monténégro	ME	MNE	499
Montserrat	MS	MSR	500
Maroc	MA	MAR	504
Mozambique	MZ	MOZ	508
Myanmar	MM	MMR	104
Namibie	NA	NAM	516
Nauru	NR	NRU	520
Népal	NP	NPL	524
Pays-Bas	NL	NLD	528
Nouvelle-Calédonie	NC	NCL	540
Nouvelle-Zélande	NZ	NZL	554
Nicaragua	NI	NIC	558
Niger	NE	NER	562
Nigeria	NG	NGA	566
Niue	NU	NIU	570
Île Norfolk	NF	NFK	574
Îles Mariannes du Nord	MP	MNP	580
Norvège	NO	NOR	578
Oman	OM	OMN	512
Pakistan	PK	PAK	586
Palau	PW	PLW	585
Palestine	PS	PSE	275
Panama	PA	PAN	591
Papouasie-Nouvelle-Guinée	PG	PNG	598
Paraguay	PY	PRY	600
Pérou	PE	PER	604
Philippines	PH	PHL	608
Pitcairn	PN	PCN	612
Pologne	PL	POL	616
Portugal	PT	PRT	620
Puerto Rico	PR	PRI	630
Qatar	QA	QAT	634
Réunion	RE	REU	638
Roumanie	RO	ROU	642
Russie	RU	RUS	643
Rwanda	RW	RWA	646
Saint-Barthélemy	BL	BLM	652
Sainte-Hélène	SH	SHN	654
Saint-Kitts-et-Nevis	KN	KNA	659
Sainte-Lucie	LC	LCA	662
Saint-Martin (partie française)	MF	MAF	663
Saint-Martin (partie néerlandaise)	SX	SXM	534
Saint-Pierre-et-Miquelon	PM	SPM	666
Saint-Vincent-et-les Grenadines	VC	VCT	670
Samoa	WS	WSM	882
Saint-Marin	SM	SMR	674
Sao Tomé-et-Principe	ST	STP	678
Arabie Saoudite	SA	SAU	682
Sénégal	SN	SEN	686
Serbie	RS	SRB	688
Seychelles	SC	SYC	690
Sierra Leone	SL	SLE	694
Singapour	SG	SGP	702
Slovaquie	SK	SVK	703
Slovénie	SI	SVN	705
Îles Salomon	SB	SLB	90
Somalie	SO	SOM	706
Afrique du Sud	ZA	ZAF	710
Géorgie du Sud et les îles Sandwich du Sud	GS	SGS	239
Sud-Soudan	SS	SSD	728
Espagne	ES	ESP	724
Sri Lanka	LK	LKA	144
Soudan	SD	SDN	736
Suriname	SR	SUR	740
Svalbard et Jan Mayen	SJ	SJM	744
Eswatini	SZ	SWZ	748
Suède	SE	SWE	752
Suisse	CH	CHE	756
Syrie	SY	SYR	760
Taiwan	TW	TWN	158
Tadjikistan	TJ	TJK	762
Tanzanie	TZ	TZA	834
Thaïlande	TH	THA	764
Timor-Leste	TL	TLS	626
Togo	TG	TGO	768
Tokelau	TK	TKL	772
Tonga	TO	TON	776
Trinité-et-Tobago	TT	TTO	780
Tunisie	TN	TUN	788
Turquie	TR	TUR	792
Turkménistan	TM	TKM	795
Îles Turques-et-Caïques	TC	TCA	796
Tuvalu	TV	TUV	798
Ouganda	UG	UGA	800
Ukraine	UA	UKR	804
Émirats Arabes Unis	AE	ARE	784
Royaume-Uni	GB	GBR	826
États-Unis	US	USA	840
Îles mineures éloignées des États-Unis	UM	UMI	581
Uruguay	UY	URY	858
Ouzbékistan	UZ	UZB	860
Vanuatu	VU	VUT	548
Venezuela	VE	VEN	862
Viêt Nam	VN	VNM	704
Îles Vierges américaines	VI	VIR	850
Wallis-et-Futuna	WF	WLF	876
Sahara occidental	EH	ESH	732
Yémen	YE	YEM	887
Zambie	ZM	ZMB	894
Zimbabwe	ZW	ZWE	716
*/
?>