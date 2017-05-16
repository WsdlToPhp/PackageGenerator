Test case examples. This list is not exhaustive nor perfect, it has been gathered in the time and can be used as a starting point.

- "Full" documentation (functions, structs, enumerations, values) with "virtual" structs inheritance documentation :
    - http://developer.ebay.com/webservices/latest/ebaySvc.wsdl
    - https://www.paypalobjects.com/wsdl/PayPalSvc.wsdl
    - http://queue.amazonaws.com/doc/2012-11-05/QueueService.wsdl
    - https://xhi.venere.com/xhi-1.0/services/OTA_ReadNotifReport.soap?wsdl

- Restriction on struct attributes :
    - https://services.pwsdemo.com/WSDL/PwsDemo_creditcardtransactionservice.xml
    - http://api.temando.com/schema/2009_06/server.wsdl
    - http://info.portaldasfinancas.gov.pt/NR/rdonlyres/02357996-29FC-4F11-9F1D-6EA2B9210D60/0/factemiws.wsdl

- Operations or struct attributes with an illegal character (ex : ., -) :
    - http://api.fromdoppler.com/Default.asmx?WSDL
    - https://webapi.aukro.cz/uploader.php?wsdl
    - https://www.paypalobjects.com/wsdl/PayPalSvc.wsdl
    - https://api5.successfactors.eu/sfapi/v1/soap12?wsdl

- Simple function parameter (not a struct) :
    - http://traveltek-importer.planetcruiseluxury.co.uk/region.wsdl

- Enumerations with two similar values (ex : y and Y in RecurringFlagType) :
    - https://www.paypalobjects.com/wsdl/PayPalSvc.wsdl

- Enumerations embedded in an element :
    - http://92.70.240.139/webservices_test/?WSDL

- Lots of import tags :
    - http://secapp.euroconsumers.org/partnerservice/PartnerService.svc?wsdl
    - https://webservices.netsuite.com/wsdl/v2012_2_0/netsuite.wsdl
    - http://mobile.esseginformatica.com:8704/?wsdl
    - https://api.bullhornstaffing.com/webservices-2.5/?wsdl
    - http://46.31.56.162/abertis/Sos.asmx?WSDL
    - http://www.reservationfactory.com/wsdls/air_v21_0/Air.wsdl with relative paths like ../ which causes bugs

- "Deep", numerous inheritance in struct classes :
    - https://moa.mazdaeur.com/mud-services/ws/PartnerService?wsdl
    - http://developer.ebay.com/webservices/latest/ebaySvc.wsdl
    - https://www.tipsport.cz/webtip/CommonBettingWS?WSDL
    - https://www.tipsport.cz/webtip/LiveBettingWS?WSDL
    - https://webservices.netsuite.com/wsdl/v2012_2_0/netsuite.wsdl
    - https://www.paypalobjects.com/wsdl/PayPalSvc.wsdl
    - http://mobile.esseginformatica.com:8704/?wsdl
    - https://api.bullhornstaffing.com/webservices-2.5/?wsdl
    - http://46.31.56.162/abertis/Sos.asmx?WSDL (real deep inheritance from AbstractGMLType)
    - http://securedev.sedagroup.com.au/ws/jadehttp.dll?SOS&listName=SedaWebService&serviceName=SedaWebServiceProvider&wsdl=wsdl
    - https://raw.github.com/jkinred/psphere/master/psphere/wsdl/vimService.wsdl
    - http://staging.timatic.aero/timaticwebservices/timatic3.WSDL
    - http://www.reservationfactory.com/wsdls/air_v21_0/Air.wsdl
    - http://voipnow2demo.4psa.com//soap2/schema/3.0.0/voipnowservice.wsdl

- Multiple service operations returns the same response type (getResult() doc comment must return one type of each) :
    - https://secure.dev.logalty.es/lgt/logteca/emisor/services/IncomingServiceWSI?wsdl
    - http://partners.a2zinc.net/dataservices/public/exhibitorprovider.asmx?WSDL

- Documentation on WSDL (must be found in the generated *WsdlClass) doc comment :
    - http://iplaypen.globelabs.com.ph:1881/axis2/services/Platform?wsdl
    - https://oivs.mvtrip.alabama.gov/service/XMLExchangeServiceCore.asmx?WSDL

- PHP reserved keyword in operation name (ex : list, add), replaced by _{keyword :
    - https://api5.successfactors.eu/sfapi/v1/soap12?wsdl
    - https://webservices.netsuite.com/wsdl/v2012_2_0/netsuite.wsdl

- Send ArrayAsParameter and ParametersAsArray case :
    - http://api.bing.net/search.wsdl

- Send parameters separately :
    - http://www.ovh.com/soapi/soapi-dlw-1.54.wsdl

- Struct attribute named _ :
    - http://46.31.56.162/abertis/Sos.asmx?WSDL (DirectPositionType, StringOrRefType, AreaType, etc.)

- From now, it can generate service function from RPC style SOAP WS. RPC style :
    - http://www.ovh.com/soapi/soapi-re-1.54.wsdl
    - http://postlinks.com/api/soap/v1.1/postlinks.wsdl
    - http://psgsa.dyndns.org:8020/gana/crm/service/v4_1/soap.php?wsdl
    - http://www.electre.com/WebService/search.asmx?WSDL
    - http://www.mobilefish.com/services/web_service/countries.php?wsdl
    - http://webservices.seek.com.au/FastLanePlus.asmx?WSDL
    - https://webapi.aukro.cz/uploader.php?wsdl
    - http://castonclients.com/fuelcircle/api/member.php?wsdl
    - https://www.fieldnation.com/api/v3.5/fieldnation.wsdl
    - https://gateway2.pagosonline.net/ws/WebServicesClientesUT?wsdl
    - http://webservices.seek.com.au/webserviceauthenticator.asmx?WSDL
    - http://webservices.seek.com.au/fastlaneplus.asmx?WSDL
    - https://80.77.87.229:2443/soap?wsdl
    - http://www.mantisbt.org/demo/api/soap/mantisconnect.php?wsdl
    - http://mira.16.1.t1.connectivegames.com/axis/services/RemoteAffiliateService?wsdl
    - http://graphical.weather.gov/xml/DWMLgen/wsdl/ndfdXML.wsdl
    - https://www.mygate.co.za/enterprise/4x0x0/ePayService.cfc?wsdl
    - http://59.162.33.102/HotelXML_V1.2/services/HotelAvailSearch?wsdl
    - http://api.4shared.com/jax2/DesktopApp?wsdl
    - http://www.eaglepictures.com/services.php/Eagle.wsdl
    - http://online.axiomtelecom.com/staging/api/v2_soap/?wsdl
    - http://www.konakart.com/konakart/services/KKWebServiceEng?wsdl
    - http://soamoa.org:9292/artistRegistry?WSDL
    - http://pgw-dev.aora.tv/trio/index.php?wsdl
    - http://npg.dl.ac.uk/MIDAS/MIDASWebServices/MIDASWebServices/VMEAccessServer.wsdl

- From now, method without any parameter are generated well. A method without any parameter :
    - http://verkopen.marktplaats.nl/soap/mpplt.php?wsdl (GetCategoryList, GetCategoryListRevision, GetPriceTypeList, GetPriceTypeListRevision, GetAttributeListRevision, GetSystemTimestamp)
    - https://gateway2.pagosonline.net/ws/WebServicesClientesUT?wsdl (doInit(), TestServiceGet, TestServiceLeer)

- Operation name with illegal characters :
    - https://raw.github.com/Sn3b/Omniture-API/master/Solution%20Items/OmnitureAdminServices.wsdl (. in the operation name, so __soapCall method is used)

- Struct attributes with same but different case (ProcStat and Procstat) should have distinct method to set and get (getProcStat/setProcStat and getProcstat_1/setProcstat_1) the value.
The contruct method must also define the key in the associative array with the corresponding method name. Plus, the operation/function which use ths attribute must call the distinct method (getProcStat and getProcstat_1).
See http://the-echoplex.net/log/php-case-sensitivity. Catch SOAPHeader definitions :
    - http://164.9.104.198/dhlexpress4youservice/Express4YouService.svc?wsdl
    - http://api.atinternet-solutions.com/toolbox/reporting.asmx?WSDL
    - http://developer.ebay.com/webservices/latest/ebaySvc.wsdl
    - https://www.paypalobjects.com/wsdl/PayPalSvc.wsdl
    - https://webservices.netsuite.com/wsdl/v2012_2_0/netsuite.wsdl
    - http://securedev.sedagroup.com.au/ws/jadehttp.dll?SOS&listName=SedaWebService&serviceName=SedaWebServiceProvider&wsdl=wsdl
    - http://api.actonsoftware.com/soap/services/ActonService2?wsdl, multiple header for a given operation
    - http://webservices.eurotaxglass.com/wsdl/forecast.wsdl
    - http://s7ips1.scene7.com/scene7/webservice/IpsApi.wsdl
    - https://ewus.nfz.gov.pl/ws-broker-server-ewus/services/ServiceBroker?wsdl
    - http://webservices.micros.com/ows/5.1/Security.wsdl
    - https://oivs.mvtrip.alabama.gov/service/XMLExchangeServiceCore.asmx?WSDL
    - http://91.93.143.3/bbmvoice/VoiceRecService.asmx?WSDL
    - http://92.45.22.83/CLZMobileWebService/MobileWebService.asmx?WSDL
    - http://87.106.12.100:9090/schemas/order-service.wsdl
    - http://destservices.touricoholidays.com/DestinationsService.svc?wsdl
    - http://partners.a2zinc.net/dataservices/public/exhibitorprovider.asmx?WSDL
    - http://sharepoint-wsdl.googlecode.com/svn/trunk/WSDL/dspsts.asmx.xml, multiple header for a given operation
    - http://eit.ebscohost.com/Services/SearchService.asmx?WSDL
    - http://drachenklasse.hosted-application.de/WebService.asmx?WSDL
    - https://api.cvent.com/soap/V200611.asmx?WSDL&debug=1
    - http://www.xignite.com/xIndices.asmx?WSDL
    - http://www.xignite.com/xCurrencies.asmx?WSDL
    - http://www.xignite.com/xInsider.asmx?WSDL
    - http://www.xignite.com/xCompensation.asmx?WSDL
    - http://www.xignite.com/xGlobalHistorical.asmx?WSDL
    - http://www.xignite.com/xRealTime.asmx?WSDL
    - https://adwords.google.com/api/adwords/cm/v201209/CampaignService?wsdl
    - https://americommerce.com/store/ws/AmeriCommerceDb.asmx?wsdl
    - http://www.relaiscolis.com/wsInfoRelaisTest/wsInfoRelais.asmx?WSDL
    - https://api.channeladvisor.com/ChannelAdvisorAPI/v3/MarketplaceAdService.asmx?WSDL
    - http://ws1.ems6.net/subscribers.asmx?WSDL
    - http://www.webxml.com.cn/WebServices/WeatherWebService.asmx?WSDL
    - http://www.xignite.com/xVWAP.asmx?WSDL
    - http://www.xignite.com/xScreener.asmx?WSDL
    - http://www.xignite.com/xChart.asmx?WSDL
    - http://www.xignite.com/xStatistics.asmx?WSDL
    - http://www.xignite.com/xHousing.asmx?WSDL
    - http://www.xignite.com/xExchanges.asmx?WSDL
    - http://www.xignite.com/xCalendar.asmx?WSDL
    - http://www.xignite.com/xIndexComponents.asmx?WSDL
    - http://www.xignite.com/xMetals.asmx?WSDL
    - http://globalrealtimeoptions.xignite.com/xglobalrealtimeoptions.asmx?WSDL
    - http://globaloptions.xignite.com/xglobaloptions.asmx?WSDL
    - http://www.xignite.com/xEnergy.asmx?WSDL
    - http://www.xignite.com/xFutures.asmx?WSDL
    - http://www.xignite.com/xMoneyMarkets.asmx?WSDL
    - http://www.xignite.com/xInterBanks.asmx?WSDL
    - http://www.xignite.com/xRates.asmx?WSDL
    - http://bondsrealtime.xignite.com/xBondsRealTime.asmx?WSDL
    - http://bonds.xignite.com/xBonds.asmx?WSDL
    - http://www.xignite.com/xFundHoldings.asmx?WSDL
    - http://www.xignite.com/xFundData.asmx?WSDL
    - http://www.xignite.com/xFunds.asmx?WSDL
    - http://www.xignite.com/xNews.asmx?WSDL
    - http://www.xignite.com/xOFAC.asmx?WSDL
    - http://www.xignite.com/xTranscripts.asmx?WSDL
    - http://www.xignite.com/xReleases.asmx?WSDL
    - http://www.xignite.com/xLogos.asmx?WSDL
    - http://www.xignite.com/xHoldings.asmx?WSDL
    - http://www.xignite.com/xEarningsCalendar.asmx?WSDL
    - http://www.xignite.com/xEstimates.asmx?WSDL
    - http://www.xignite.com/xEdgar.asmx?WSDL
    - http://www.xignite.com/xAnalysts.asmx?WSDL
    - http://www.xignite.com/xGlobalFundamentals.asmx?WSDL
    - http://www.xignite.com/xFundamentals.asmx?WSDL
    - http://www.xignite.com/xFinancials.asmx?WSDL
    - http://www.xignite.com/xHistorical.asmx?WSDL
    - http://www.xignite.com/xNASDAQLastSale.asmx?WSDL
    - http://www.xignite.com/xBATSLastSale.asmx?WSDL
    - http://www.xignite.com/xBATSRealTime.asmx?WSDL
    - http://www.xignite.com/xQuotes.asmx?WSDL
    - http://globalquotes.xignite.com/xglobalquotes.asmx?WSDL
    - http://globalrealtime.xignite.com/xglobalrealtime.asmx?WSDL
    - http://www.xignite.com/xWatchLists.asmx?WSDL
    - http://www.xignite.com/xSecurity.asmx?WSDL
    - http://globalbondmaster.xignite.com/xGlobalBondMaster.asmx?WSDL
    - http://globalmaster.xignite.com/xglobalmaster.asmx?WSDL
    - http://bondmaster.xignite.com/xBondMaster.asmx?WSDL
    - http://radiopilatusadmin.showare.sta.v-1.ch/WebServices/MemberDataServiceProvider.asmx?WSDL
    - http://mail.yahooapis.com/ws/mail/v1.1/wsdl
    - https://xhi.venere.com/xhi-1.0/services/OTA_ReadNotifReport.soap?wsdl, multiple header for a given operation
    - http://demo.braingroup.ch/financial-kernel-ws/b2c/1?wsdl
    - http://demo.braingroup.ch/financial-kernel-ws/tax/1?wsdl
    - http://commonwebservices.saralee-de.com/mcdb2g/Services.asmx?WSDL
    - http://staging.timatic.aero/timaticwebservices/timatic3.WSDL sessionID for processLogin has a header with required="false"
    - http://www.reservationfactory.com/wsdls/air_v21_0/Air.wsdl
    - http://unit4.detuinmachinecompany.com/wsdl.xml WebID for operations is required with wsdl:required="true"
    - http://www.martonhouse.net/Invensys/InvensysAPI.asmx?WSDL
    - http://yz.emsecure.net/automation/individual.asmx?WSDL

- Similar struct name:
    - http://voipnow2demo.4psa.com//soap2/schema/3.0.0/voipnowservice.wsdl timeInterval/TimeInterval, recharge/Recharge

- Undefined parameter/return types by the \SoapClient but determined by the Generator class
    - http://portaplusapi.icc-switch.com/soap12

- Operations calls own obect parameter methods and inherited methods (php code and php doc must take account of the inheritance) :
    - http://voipnow2demo.4psa.com//soap2/schema/3.0.0/voipnowservice.wsdl, ex : Add, AddUser, AddServiceProvider
    - http://www.reservationfactory.com/wsdls/air_v21_0/Air.wsdl, ex : service

- Biggest Packages generated :
    - https://raw.github.com/jkinred/psphere/master/psphere/wsdl/vimService.wsdl
    - https://americommerce.com/store/ws/AmeriCommerceDb.asmx?wsdl
    - http://www.ovh.com/soapi/soapi-dlw-1.54.wsdl
    - https://webservices.netsuite.com/wsdl/v2012_2_0/netsuite.wsdl

- Web Service with multiple parameters of same type per operation, parameters are now named as the original parameter name
    - http://demo.magentocommerce.com/api/v2_soap?wsdl=1, ex: login operation

- Web Service with all parameter only detected with unknown parameter type and return per operation. These types must be retrieved from the WSDLs
    - http://196.29.140.10:9091/services/MyBoardPack.Soap.svc?singleWsdl
