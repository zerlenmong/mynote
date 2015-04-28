<?php
magento 目录结构	
1 /app – 程序根目录
2 
3 /app/etc – 全局配置文件目录
4 
5 /app/code – 所有模块安装其模型和控制器的目录
6 
7 /app/code/core – 核心代码或经过认证得模块，如果要升级不要这里的代码
8 
9 /app/code/community – 社区版的模块目录
10 
11 /app/code/local – 定制代码目录
12 
13 /app/code/core/Mage? – magento默认命名空间
14 
15 /app/code/core/Mage?/{Module} – 模块根目录
16 
17 /app/code/core/Mage?/{Module}/etc – 模块的配置文件目录
18 
19 /app/code/core/Mage?/{Module}/controllers – 模块的控制器
20 
21 /app/code/core/Mage?/{Module}/Block? – 显示块的逻辑类
22 
23 /app/code/core/Mage?/{Module}/Model? – 模块的对象模型
24 
25 /app/code/core/Mage?/{Module}/Model/Mysql4? – 模块的资源模型
26 
27 /app/code/core/Mage?/{Module}/sql – 模块各个版本的安装和升级用sql
28 
29 /app/code/core/Mage?/{Module}/sql/{resource}/- 升级是需要的资源模型
30 
31 /app/code/core/Mage?/{Module}/sql/{resource}/{type}-{action}-{versions}.(sql|php) – 资源升级文件 例如: mysql4-upgrade-0.6.23-0.6.25.sql
32 
33 /app/design – 设计包目录 (layouts, templates, translations)
34 
35 /app/design/frontend – 前端的设计
36 
37 /app/design/adminhtml – 后台管理设计
38 
39 /app/design/{area}/{package}/{theme} – 定制的主题
40 
41 /app/design/{area}/{package}/{theme}/layout – 定义显示块的 .xml 文件
42 
43 /app/design/{area}/{package}/{theme}/template – .phtml (html with php tags)模版
44 
45 /app/design/{area}/{package}/{theme}/locale – Zend_Translate 兼容的主题用的文字翻译
46 
47 /app/locale – 本地化文件
48 
49 /app/locale/{locale (en_US)} – Zend_Translate 兼容的模块用的文字翻译
50 
51 /skin/{area}/{package}/{theme}/- css和图像
52 
53 /lib – 公用库
54 
55 /js – javascripts
56 
57 /media – 上传文件存放目录
58 
59 /tests – 测试目录
60 
61 /var – 临时文件目录		

--------------------------------------------------			
magento源码目录结构图  

2011-05-19 22:39:57|  分类： Magento |举报|字号 订阅
magento SEO 从源码开始
PROJECT MAGENTO
│ .htaccess
│ cron.php //系统cron程序，修改linux的cron运行，加入magento的一些定时处理
│ cron.sh
│ favicon.ico //网站fav图标
│ index.php //网站入口
│ index.php.sample //网站入口范例文件
│ install.php //网站安装文件
│ LICENSE.html //许可证
│ LICENSE.txt //许可证
│ LICENSE_AFL.txt //AFL许可证
│ pear //pear安装文件
│ php.ini.sample //php.ini范例文件
│ STATUS.txt //当前版本状态
│ .project
│
├─var
│ │ .htaccess
│ │
│ ├─session //SESSION存储目录
│ │ sess_86ltacqm3dabfc7cneu0tt32j2
│ │ sess_onsigpdub8e39ner2oul38a1k3
│ │ ....
│ │
│ ├─cache //文件缓存目录
│ │ ├─mage--c 
│ │ │ mage---internal-metadatas---Zend_LocaleL_en_US_language_
│ │ │ mage---Zend_LocaleL_en_US_language_
│ │ │
│ │ └─mage--d
│ │ ...
│ │
│ └─report //错误报告目录
│ -1845517129
│ -567068937
│
├─skin //skin皮肤目录
│ ├─install //安装程序皮肤
│ │ └─default //default默认商店主题安装目录
│ │ └─default //default缺省主题安装目录
│ │ │ favicon.ico //网站fav.ico
│ │ │
│ │ ├─images //安装程序皮肤图片目录
│ │ │ error_msg_icon.gif
│ │ │ ...
│ │ │
│ │ └─css //安装程序皮肤css目录
│ │ boxes.css
│ │ clears.css
│ │ ie7minus.css
│ │ iestyles.css
│ │ reset.css
│ │
│ ├─frontend //前台皮肤目录
│ │
│ └─adminhtml //后台皮肤目录
│
├─report //系统错误报告WEB访问程序
│ │ .htaccess
│ │ config.xml
│ │ index.php
│ │
│ └─skin
│ └─default
│ │ index.phtml
│ │
│ └─images
│ success_msg_icon.gif
│ ...
│
├─pkginfo //安装包详细版本信息
│ .htaccess
│ Mage_All.txt
│ Mage_All_Latest.txt
│ Mage_Cybermut.txt
│ Mage_Paybox.txt
│
├─media //媒体文件（网站上传功能上传上来的文件）目录
│ ├─import
│ └─downloadable //可供URL下载的目录
│ .htaccess
│
├─lib //Megento加载使用的核心库目录
│ │ .htaccess
│ │
│ ├─Zend //Zend框架
│ │ │ Acl.php
│ │ │ ...
│ │ │
│ │ └─Acl
│ │ ...
│ │
│ ├─Varien //Magento的Varien框架
│ │ └─Action
│ │ ...
│ │
│ ├─PEAR //PEAR框架
│ │ └─HTTP
│ │ ...   
│ │
│ ├─LinLibertineFont //字体
│ │
│ ├─googlecheckout //googlecheckout
│ │
│ └─flex //flex
│
├─js
│ │ blank.html
│ │ index.php //javascript读取、缓冲程序
│ │ spacer.gif
│ │
│ ├─varien //Varien javascript 框架
│ │
│ ├─scriptaculous //scriptaculous javascript 框架
│ │
│ ├─prototype //prototype javascript 框架
│ │
│ ├─mage //mage javascript 框架
│ │
│ ├─lib //mage javascript 框架
│ │
│ ├─flash //Flash导入 javascript语句
│ │ AC_RunActiveContent.js
│ │
│ ├─extjs //EXT JS
│ │
│ └─calendar //日历
│
├─includes //TODO: UNKNOWN
│ .htaccess
│ config.php
│
├─downloader //网站扩展下载程序
│
├─app //网站应用程序目录
│ │ .htaccess
│ │ Mage.php //Mege.php系统核心运行类
│ │
│ ├─locale //语言包
│ │ └─en_US
│ │ │ Mage_Tax.csv //语言包
│ │ │ ...
│ │ │
│ │ └─template //独立语言包 - 模板
│ │ └─email //语言包 - email部分
│ │
│ ├─etc //网站应用程序总配置目录
│ │ │ config.xml //？？此配置文件用法未明
│ │ │ local.xml //网站配置
│ │ │
│ │ └─modules //网站模块配置目录
│ │ Mage_All.xml
│ │ Mage_AmazonPayments.xml
│ │ Mage_Api.xml
│ │ Mage_Bundle.xml
│ │ Mage_Compiler.xml
│ │ Mage_Downloadable.xml
│ │ Mage_Weee.xml
│ │ Jasy_HelloWorld.xml
│ │
│ ├─design //模板目录
│ │ ├─install //安装程序模板目录
│ │ │ └─default //默认商店模板目录
│ │ │ └─default //默认商店默认主题模板目录
│ │ │ ├─template //模板目录
│ │ │ │ │ page.phtml
│ │ │ │ │
│ │ │ │ └─install //子模板目录
│ │ │ │ begin.phtml
│ │ │ │ ...
│ │ │ │
│ │ │ └─layout //布局模板目录
│ │ │ main.xml
│ │ │
│ │ ├─frontend //前台模板目录
│ │ │
│ │ └─adminhtml //后台管理模板目录
│ │
│ └─code //程序代码目录
│ ├─local //本地程序代码目录
│ │ └─HelloWorld //HelloWord 公司模块目录
│ │ ├─Block //Block “块”模块目录
│ │ │ Hello.php //Hello 块
│ │ │
│ │ ├─controllers //控制器目录
│ │ │ StandardController.php //StandardController.php （标准控制器）
│ │ │
│ │ ├─etc //HelloWord模块配置
│ │ │ config.xml
│ │ │ system.xml //?继承后台的配置
│ │ │
│ │ ├─Helper //协助模块
│ │ │ Data.php //数据源协助模块
│ │ │
│ │ ├─Model //业务逻辑模块
│ │ │ Standard.php //Standard（标准业务逻辑）
│ │ │
│ │ └─sql //安装SQL
│ │ └─newmodule_setup
│ │ mysql4-install-0.1.0.php
│ │
│ ├─core //核心模块，一般指Zend、Mege公司出品的模块
│ │ ├─Zend //Zend公司模块
│ │ │
│ │ └─Mage //Mage公司模块
│ │
│ └─community //第三方扩展模块
└─404 //404页面（这里不适用“块”之类的定义，直接使用原生php定义）
│ index.php			

---------------------------
Magento的配置系统就像是Magento的心脏，支撑着Magento的运行。
这套配置系统掌管着几乎所有 “module/model/class/template/etc”。
它把整个Magento系统抽象出来，用一个配置文件来描述。这里的“配置文件” 并不是一个物理上存在的文件，
而是Magento根据当前的系统状态动态生成的一段XML。大多数的PHP开发者并不习惯于这样抽象层，
因为它增加的编程 的复杂性。但是这样的抽象提供了无与伦比的灵活性，允许你覆盖几乎任何系统的默认行为。
首先，让我们写一个简单的插件来看看这个所谓的“配置文件”长什么样。虽然我已经提供的现成的代码，
但是还是建议你自己建立这个插件，把整个流程走一遍有助于你的理解。
设置插件的目录结构
我们将要创建一个Magento的模块【注： Magento的插件不叫plug-in，叫module，翻译成模块】。
Magento的模块由php和xml文件组成，目的是扩展或者覆盖系统的行 为，比如为订单增加数据模型，
更改一个类的方法，或者增加一个全新的功能。【注：Magento自带的那些功能也都是基于模块的，
比如用户注册，商品展 示，结账流程等等。Magento给我的感觉就是一切皆模块，和Eclipse的插件体系结构有点像】
大多数Magento的系统模块的结构和我们将要构建的插件的结构是一样的。Magento的系统模块在以下目录
app/code/core/Mage

每一个子目录都是一个单独的模块。这些模块是由Magento官方开发的。我们安装完Magento以后，
所使用的功能就是来自这些模块。我们自己创建的模块应该放在如下目录
app/code/local/Packagename

“Packagename”应该是一个唯一的字符串，用来标识你的代码。通常人们使用公司名字作为Packagename，比如
app/code/local/Microsoft

由于我在做我自己的Magento项目，我将使用我自己的项目名“App”。 然后，我们要创建以下目录结构
app/code/local/App/Configviewer/Block
app/code/local/App/Configviewer/controllers
app/code/local/App/Configviewer/etc
app/code/local/App/Configviewer/Helper
app/code/local/App/Configviewer/Model
app/code/local/App/Configviewer/sql
你的插件并不一定需要包含以上所有的目录，但是为了以后开发方便，我们还是在一开始就把目录创建好。接下来我们要创建两个文件，一个是config.xml，放在etc目录下面
app/code/local/App/Configviewer/etc/config.xml
文件内容如下
<config>
<modules>
<App_Configviewer>
<version>0.1.0</version>
</App_Configviewer>
</modules>
</config>
第二个文件需要在如下位置创建
app/etc/modules/App_Configviewer.xml
第二个文件应该遵循如下命名规则“Packagename_Modulename.xml”，文件内容如下
<config>
<modules>
<App_Configviewer>
<active>true</active>
<codePool>local</codePool>
</App_Configviewer>
</modules>
</config>
我们先不管这些文件是干什么的，以后会解释。建立好这两个文件以后，你的模块的骨架就已经完成了。
Magento已经知道你的模块存在，但是现在你的模块不会做任何事情。
我们来确认一下Magento确实装载了你的模块
清空Magento缓存
在后台管理界面，进入 System->Configuration->Advanced
展开“Disable Modules Output”
确认“App_Configviewer”显示出来了
如果你看到“App_Configviewer”，那么恭喜你，你已经成功创建了你第一个Magento模块！
创建模块逻辑
我们之前创建的模块不会做任何事情，下面我们来为这个模块加入逻辑
1. 检查“showConfig”查询字符串是否存在
2. 如果“showConfig”存在，那么检查“showConfigFormat”查询字符串是否存在
3. 如果“showConfigFormat”存在，那么输出指定格式的配置信息，否则输出默认格式的配置信息
4. 终止执行流程
首先更改我们的config.xml文件
<?xml version="1.0" encoding="UTF-8"?>
<config> 
  <modules>
    <App_Configviewer>
    <version>0.1.0</version>
    </App_Configviewer>
  </modules>
  <global>
    <events>
      <controller_front_init_routers>
      <observers>
        <app_configviewer_model_observer>
        <type>singleton</type> 
        <class>App_Configviewer_Model_Observer</class>
        <method>checkForConfigRequest</method>
        </app_configviewer_model_observer>
      </observers>
      </controller_front_init_routers>
    </events>
  </global>
</config>
然后创建如下文件
App/Configviewer/Model/Observer.php
输入以下内容
<?php
class App_Configviewer_Model_Observer {
  const FLAG_SHOW_CONFIG = 'showConfig';
  const FLAG_SHOW_CONFIG_FORMAT = 'showConfigFormat';
  private $request;
  public function checkForConfigRequest($observer) {
    $this->request = $observer->getEvent ()->getData ( 'front' )->getRequest ();
    if ($this->request->{self::FLAG_SHOW_CONFIG} === 'true') {
      $this->setHeader ();
      $this->outputConfig ();
    }
  }
  private function setHeader() {
    $format = isset ( $this->request->{self::FLAG_SHOW_CONFIG_FORMAT} ) ? $this->request->{self::FLAG_SHOW_CONFIG_FORMAT} : 'xml';
    switch ($format) {
      case 'text' :
      header ( "Content-Type: text/plain" );
      break;
      default :
      header ( "Content-Type: text/xml" );
    }
  }
  private function outputConfig() {
    die ( Mage::app ()->getConfig ()->getNode ()->asXML () );
  }
}
?>
好了，代码编辑结束。清空你的Magento缓存，输入如下URL
http://magento.example.com/?showConfig=true
【注： 根据文中的配置，不难看出任何指向Magento的URL加了“?showConfig=true”以后，都会输出同样的内容，正常的执行流程会被终止。】
配置文件分析
打开上述URL，你应该看到一个巨大的XML文件。
这个文件描述了当前Magento系统的状态。它列出了所有的模块，数据模型，类，事件，监听器等等。举个例子，如果你搜索如下字符串
Configviewer_Model_Observer
你会发现刚刚你创建的那个类被列出来了。Magento会解析每个模块的config.xml，并把它们包含在这个全局配置中。
这个配置文件有啥用？
到目前为止，我们所作的事情似乎没什么意义，但是这个配置文件却是理解Magento的关键因素。你创建的每一个模块都会被加到这个配置文件中，任 何时候，你需要调用一个系统功能的时候，Magento都会通过这个配置文件来查询相应的模块和功能。举个简单的例子，如果你懂MVC的话，你应该和 “helper class”之类概念的打过交道
$helper_salesrule = new Mage_SalesRule_Helper();
Magento抽象了PHP的类声明方式。在Magento系统中，上面的代码等同于
$helper_salesrule = Mage::helper('salesrule');
Magento将通过以下逻辑来处理这行代码
在配置文件中查找标签
在里面查找 标签
在里面查找 标签
实例化从#3找到的类（Mage_SalesRule_Helper）
Magento总是通过配置文件来获得类名，这个逻辑看起来有些复杂，但这样做的优点也很明显，我们可以不需要更改Magento的代码就能更改 Magento的核心功能。【注： 在这个例子中，我们可以通过修改配置文件用我们自己的SalesRule_Helper类来替换原来那个】这种高度抽象的编程方式在php中并不常见，但 是它可以让你清晰的扩展或者替换系统的某一部分。
--------------------------------------------------------------------------------
如果你已经学会了扩展模块的基本输出方法，那么本文一定是你需要的——使用正规的方法输出网页。 

假设模块为Cartz_Hotel，我们想当访问 
http://localhost/magento/index.php/hotel/my/room能够输出Hello , phtml Page 
I. 建立controllers/MyController.php内容如下： 
<?php  
class Cartz_Hotel_MyController extends Mage_Core_Controller_Front_Action{  
  public function roomAction(){  
    $this->loadLayout();  
    $this->renderLayout();  
  }  
}  

II. etc/config.xml 

<?xml version="1.0"?>  
<config>  
 <modules>  
  <Cartz_Hotel>  
  <version>0.1.0</version>  
  </Cartz_Hotel>  
</modules>  
<frontend>  
  <routers>  
   <hotel>  
    <use>standard</use>  
    <args>  
     <module>Cartz_Hotel</module>  
     <frontName>hotel</frontName>  
   </args>  
 </hotel>  
</routers>  
<layout>  
  <updates>  
    <hotel>  
      <file>hotel.xml</file>  
    </hotel>  
  </updates>  
</layout>  
</frontend>  
<global>  
  <blocks>  
   <hotel><class>Cartz_Hotel_Block</class></hotel>  
 </blocks>  
</global>  
</config>  



config.xml最重要的部分是 
1. hotel.xml将稍后用来作为配置模块layout的文件 
2. <class>Cartz_Hotel_Block</class>用来说明Block类命名规则（文件的目录位置）。 

III. Block/Room.php 

<?php  
class Cartz_Hotel_Block_Room extends Mage_Core_Block_Template{  
 public function getHello() {  
  return "Hello, phtml page";  
}  
}  



IV. 建立phtml文件 
$MAGENTO_INSTALLED_DIR/app/design/<frontend>/<theme package>/<theme name>/template/hotel/room.phtml 

Java代码  收藏代码
<h1><?php echo $this->getHello(); ?></h1>  



V. 建立Layout文件 
$MAGENTO_INSTALLED_DIR/app/design/<frontend>/<theme package>/<theme name>/layout/hotel.xml 
Xml代码  收藏代码
<?xml version="1.0"?>  
<layout version="0.1.0">  
 <hotel_my_room>  
 <reference name="root">  
  <action method="setTemplate"><template>page/1column.phtml</template></action>  
</reference>  
<reference name="content">  
  <block type="hotel/room" name="hotel_room" template="hotel/room.phtml"/>  
</reference>  
</hotel_my_room>  
</layout>  



当访问http://localhost/magento/index.php/hotel/my/room时，Magento自动会定位到标签<hotel_my_room>对应的block。

<block type="hotel/room" name="hotel_room" template="hotel/room.phtml"/>  

block的type是hotel/room，将执行对应Cartz_Hotel_Block_Room类，然后找到对应的template/hotel/room.phtml文件。

hotel.xml中 
<block type="hotel/room" name="hotel_room" template="hotel/room.phtml"/> 的type="<config.xm中的frontName>/<Controller里的方法名去掉Action>"


跑了一下，总结了几点注意的地方： 
1. Magento模块url访问的命名规范: 
http://<host>/<Magento虚拟目录>/<config.xm中的frontName>/<Controller文件名去掉Controller>/<Controller里的方法名去掉Action> 
（缺省为index），如：http://<host>/<Magento虚拟目录>/hotel/my将访问MyController中的indexAction方法 
2. 与之前例子http://koda.iteye.com/blog/254887不同在于： 
a). MyController.php的roomAction()中采用加载layout文件的方式： 
$this->loadLayout();   
$this->renderLayout(); 
b). etc/config.xml 中加入了 
<layout>  
  <updates>  
    <hotel>  
     <file>hotel.xml</file>  
   </hotel>  
 </updates>  
</layout> 和 
<global>  
  <blocks>  
    <hotel><class>Cartz_Hotel_Block</class></hotel>  
  </blocks>  
</global>  （注意之前是用Model） 
c). 同样，要新建Block目录及其下的Room.php,Room继承自Mage_Core_Block_Template,并且方法中是return 而不是echo 
d). 增加 phtml文件 
e). 建立etc/config.xml中layout中指定的layout文件，注意layout中标签的命名

--------------------config.xml配置文件大致的框架-----------------
<config>
  <modules>
    <(NameSpace_ModuleName)></(NameSpace_ModuleName)>
  </modules>
  <global>
    <models></models>
    <resources></resources>
    <blocks></blocks>
    <helpers></helpers>
    <fieldsets></fieldsets>
    <template></template>
    <events></events>
    <eav_attributes></eav_attributes>
    <(modulename)><!-- custom config variables --></(modulename)>
  </global>
  <admin>
    <attributes></attributes>
    <routers></routers>
    <fieldsets></fieldsets>
  </admin>
  <adminhtml>
    <events></events>
    <global_search></global_search>
    <translate></translate>
    <layout></layout>
    <(modulename)><!-- custom config variables --></(modulename)>
  </adminhtml>
  <install>
    <translate></translate>
  </install>
  <frontend>
    <routers></routers>
    <events></events>
    <translate></translate>
    <layout></layout>
  </frontend>
  <default>
    <(modulename)><!-- custom config variables --></(modulename)>
  </default>
  <stores>
    <admin></admin>
  </stores>
  <websites>
    <admin></admin>
  </websites>
</config>



--------------------------------------------------------------------------------
/app – 程序根目录

/app/etc – 全局配置文件目录

/app/code – 所有模块安装其模型和控制器的目录

/app/code/core – 核心代码或经过认证得模块，如果要升级不要这里的代码

/app/code/community – 社区版的模块目录

/app/code/local – 定制代码目录

/app/code/core/Mage? – magento默认命名空间

/app/code/core/Mage?/{Module} – 模块根目录

/app/code/core/Mage?/{Module}/etc – 模块的配置文件目录

/app/code/core/Mage?/{Module}/controllers – 模块的控制器

/app/code/core/Mage?/{Module}/Block? – 显示块的逻辑类

/app/code/core/Mage?/{Module}/Model? – 模块的对象模型

/app/code/core/Mage?/{Module}/Model/Mysql4? – 模块的资源模型

/app/code/core/Mage?/{Module}/sql – 模块各个版本的安装和升级用sql

/app/code/core/Mage?/{Module}/sql/{resource}/- 升级是需要的资源模型

/app/code/core/Mage?/{Module}/sql/{resource}/{type}-{action}-{versions}.(sql|php) – 资源升级文件 例如: mysql4-upgrade-0.6.23-0.6.25.sql

/app/design – 设计包目录 (layouts, templates, translations)

/app/design/frontend – 前端的设计

/app/design/adminhtml – 后台管理设计

/app/design/{area}/{package}/{theme} – 定制的主题

/app/design/{area}/{package}/{theme}/layout – 定义显示块的 .xml 文件

/app/design/{area}/{package}/{theme}/template – .phtml (html with php tags)模版

/app/design/{area}/{package}/{theme}/locale – Zend_Translate 兼容的主题用的文字翻译

/app/locale – 本地化文件

/app/locale/{locale (en_US)} – Zend_Translate 兼容的模块用的文字翻译

/skin/{area}/{package}/{theme}/- css和图像

/lib – 公用库

/js – javascripts

/media – 上传文件存放目录

/tests – 测试目录

/var – 临时文件目录



-------------------------------------------------------------------------------------------
File	Line	Event
cron.php	46	default
app/code/core/Mage/Adminhtml/Controller/Action.php	159	adminhtml_controller_action_predispatch_start
app/code/core/Mage/Adminhtml/Block/Customer/Edit/Tab/Carts.php	61	adminhtml_block_html_before
app/code/core/Mage/Adminhtml/Block/Report/Grid.php	186	adminhtml_widget_grid_filter_collection
app/code/core/Mage/Adminhtml/Block/Cms/Page/Edit/Tab/Meta.php	76	adminhtml_cms_page_edit_tab_meta_prepare_form
app/code/core/Mage/Adminhtml/Block/Cms/Page/Edit/Tab/Design.php	125	adminhtml_cms_page_edit_tab_design_prepare_form
app/code/core/Mage/Adminhtml/Block/Cms/Page/Edit/Tab/Main.php	119	adminhtml_cms_page_edit_tab_main_prepare_form
app/code/core/Mage/Adminhtml/Block/Cms/Page/Edit/Tab/Content.php	98	adminhtml_cms_page_edit_tab_content_prepare_form
app/code/core/Mage/Adminhtml/Block/Api/User.php	52	api_user_html_before
app/code/core/Mage/Adminhtml/Block/Widget/Container.php	307	adminhtml_widget_container_html_before
app/code/core/Mage/Adminhtml/Block/Permissions/User.php	52	permissions_user_html_before
app/code/core/Mage/Adminhtml/Block/Template.php	80	adminhtml_block_html_before
app/code/core/Mage/Adminhtml/Block/Sales/Reorder/Renderer/Action.php	55	adminhtml_customer_orders_add_action_renderer
app/code/core/Mage/Adminhtml/Block/Catalog/Category/Tabs.php	157	adminhtml_catalog_category_tabs
app/code/core/Mage/Adminhtml/Block/Catalog/Category/Tree.php	284	adminhtml_catalog_category_tree_is_moveable
app/code/core/Mage/Adminhtml/Block/Catalog/Category/Tree.php	321	adminhtml_catalog_category_tree_can_add_root_category
app/code/core/Mage/Adminhtml/Block/Catalog/Category/Tree.php	341	adminhtml_catalog_category_tree_can_add_sub_category
app/code/core/Mage/Adminhtml/Block/Catalog/Category/Tab/Attributes.php	161	adminhtml_catalog_category_edit_prepare_form
app/code/core/Mage/Adminhtml/Block/Catalog/Product/Grid.php	311	adminhtml_catalog_product_grid_prepare_massaction
app/code/core/Mage/Adminhtml/Block/Catalog/Product/Helper/Form/Gallery/Content.php	60	catalog_product_gallery_prepare_layout
app/code/core/Mage/Adminhtml/Block/Catalog/Product/Attribute/New/Product/Attributes.php	64	adminhtml_catalog_product_edit_prepare_form
app/code/core/Mage/Adminhtml/Block/Catalog/Product/Attribute/New/Product/Attributes.php	80	adminhtml_catalog_product_edit_element_types
app/code/core/Mage/Adminhtml/Block/Catalog/Product/Attribute/Set/Main.php	406	adminhtml_catalog_product_attribute_set_main_html_before
app/code/core/Mage/Adminhtml/Block/Catalog/Product/Attribute/Set/Toolbar/Main.php	68	adminhtml_catalog_product_attribute_set_toolbar_main_html_before
app/code/core/Mage/Adminhtml/Block/Catalog/Product/Attribute/Edit/Tab/Main.php	71	adminhtml_product_attribute_types
app/code/core/Mage/Adminhtml/Block/Catalog/Product/Attribute/Edit/Tab/Main.php	242	adminhtml_catalog_product_attribute_edit_prepare_form
app/code/core/Mage/Adminhtml/Block/Catalog/Product/Edit/Action/Attribute/Tab/Attributes.php	50	adminhtml_catalog_product_form_prepare_excluded_field_list
app/code/core/Mage/Adminhtml/Block/Catalog/Product/Edit/Tab/Attributes.php	143	adminhtml_catalog_product_edit_prepare_form
app/code/core/Mage/Adminhtml/Block/Catalog/Product/Edit/Tab/Attributes.php	167	adminhtml_catalog_product_edit_element_types
app/code/core/Mage/Adminhtml/Block/Catalog/Product/Edit/Tab/Price/Recurring.php	42	catalog_product_edit_form_render_recurring
app/code/core/Mage/Adminhtml/Block/Catalog/Product/Edit/Tab/Attributes/Create.php	85	adminhtml_catalog_product_edit_tab_attributes_create_html_before
app/code/core/Mage/Adminhtml/Block/Promo/Widget/Chooser.php	106	adminhtml_block_promo_widget_chooser_prepare_collection
app/code/core/Mage/Adminhtml/Block/Promo/Catalog/Edit/Tab/Main.php	187	adminhtml_promo_catalog_edit_tab_main_prepare_form
app/code/core/Mage/Adminhtml/Block/Promo/Quote/Edit/Tab/Actions.php	162	adminhtml_block_salesrule_actions_prepareform
app/code/core/Mage/Adminhtml/Block/Promo/Quote/Edit/Tab/Main.php	277	adminhtml_promo_quote_edit_tab_main_prepare_form
app/code/core/Mage/Adminhtml/Block/Promo/Quote/Edit/Tab/Coupons/Form.php	132	adminhtml_promo_quote_edit_tab_coupons_form_prepare_form
app/code/core/Mage/Adminhtml/Block/System/Config/Form/Fieldset/Modules/DisableOutput.php	42	adminhtml_system_config_advanced_disableoutput_render_before
app/code/core/Mage/Adminhtml/Block/System/Config/Tabs.php	102	adminhtml_block_system_config_init_tab_sections_before
app/code/core/Mage/Adminhtml/Block/System/Store/Edit/Form.php	342	adminhtml_store_edit_form_prepare_form
app/code/core/Mage/Adminhtml/controllers/Cms/PageController.php	139	cms_page_prepare_save
app/code/core/Mage/Adminhtml/controllers/Cms/PageController.php	199	adminhtml_cmspage_on_delete
app/code/core/Mage/Adminhtml/controllers/Cms/PageController.php	204	adminhtml_cmspage_on_delete
app/code/core/Mage/Adminhtml/controllers/CacheController.php	56	adminhtml_cache_flush_all
app/code/core/Mage/Adminhtml/controllers/CacheController.php	68	adminhtml_cache_flush_system
app/code/core/Mage/Adminhtml/controllers/CacheController.php	128	adminhtml_cache_refresh_type
app/code/core/Mage/Adminhtml/controllers/CacheController.php	145	clean_media_cache_after
app/code/core/Mage/Adminhtml/controllers/CacheController.php	169	clean_catalog_images_cache_after
app/code/core/Mage/Adminhtml/controllers/Permissions/RoleController.php	193	admin_permissions_role_prepare_save
app/code/core/Mage/Adminhtml/controllers/ReportController.php	82	on_view_report
app/code/core/Mage/Adminhtml/controllers/Sales/Order/CreateController.php	143	adminhtml_sales_order_create_process_data_before
app/code/core/Mage/Adminhtml/controllers/Sales/Order/CreateController.php	257	adminhtml_sales_order_create_process_data
app/code/core/Mage/Adminhtml/controllers/Sales/Order/CreditmemoController.php	160	adminhtml_sales_order_creditmemo_register_before
app/code/core/Mage/Adminhtml/controllers/Catalog/CategoryController.php	189	category_prepare_ajax_response
app/code/core/Mage/Adminhtml/controllers/Catalog/CategoryController.php	314	catalog_category_prepare_save
app/code/core/Mage/Adminhtml/controllers/Catalog/CategoryController.php	409	catalog_controller_category_delete
app/code/core/Mage/Adminhtml/controllers/Catalog/Product/GalleryController.php	49	catalog_product_gallery_upload_image_after
app/code/core/Mage/Adminhtml/controllers/Catalog/Product/Action/AttributeController.php	165	catalog_product_to_website_change
app/code/core/Mage/Adminhtml/controllers/Catalog/ProductController.php	192	catalog_product_new_action
app/code/core/Mage/Adminhtml/controllers/Catalog/ProductController.php	237	catalog_product_edit_action
app/code/core/Mage/Adminhtml/controllers/Catalog/ProductController.php	659	catalog_product_prepare_save
app/code/core/Mage/Adminhtml/controllers/Catalog/ProductController.php	882	catalog_controller_product_delete
app/code/core/Mage/Adminhtml/controllers/Promo/CatalogController.php	120	adminhtml_controller_catalogrule_prepare_save
app/code/core/Mage/Adminhtml/controllers/Promo/QuoteController.php	120	adminhtml_controller_salesrule_prepare_save
app/code/core/Mage/Adminhtml/controllers/CustomerController.php	314	adminhtml_customer_prepare_save
app/code/core/Mage/Adminhtml/controllers/CustomerController.php	344	adminhtml_customer_save_after
app/code/core/Mage/Adminhtml/controllers/System/Config/System/StorageController.php	154	add_synchronize_message
app/code/core/Mage/Adminhtml/controllers/System/Convert/ProfileController.php	262	$adapter->getEventPrefix(
app/code/core/Mage/Adminhtml/controllers/System/ConfigController.php	164	admin_system_config_section_save_after
app/code/core/Mage/Adminhtml/controllers/System/ConfigController.php	172	admin_system_config_changed_section_{$section}
app/code/core/Mage/Adminhtml/controllers/System/StoreController.php	202	store_group_save
app/code/core/Mage/Adminhtml/controllers/System/StoreController.php	225	$eventName
app/code/core/Mage/Adminhtml/controllers/System/StoreController.php	434	store_delete
app/code/core/Mage/Adminhtml/Model/Config/Data.php	48	model_config_data_save_before
app/code/core/Mage/Adminhtml/Model/Sales/Order/Create.php	341	sales_convert_order_to_quote
app/code/core/Mage/Adminhtml/Model/Sales/Order/Create.php	434	sales_convert_order_item_to_quote_item
app/code/core/Mage/Adminhtml/Model/Sales/Order/Create.php	1552	checkout_submit_all_after
app/code/core/Mage/GoogleCheckout/Block/Link.php	90	googlecheckout_block_link_html_before
app/code/core/Mage/GoogleCheckout/controllers/RedirectController.php	98	googlecheckout_checkout_before
app/code/core/Mage/GoogleCheckout/Model/Api/Xml/Checkout.php	170	google_checkout_discount_item_price
app/code/core/Mage/GoogleCheckout/Model/Api/Xml/Callback.php	355	googlecheckout_create_order_before
app/code/core/Mage/GoogleCheckout/Model/Api/Xml/Callback.php	449	googlecheckout_save_order_after
app/code/core/Mage/GoogleCheckout/Model/Api/Xml/Callback.php	463	checkout_submit_all_after
app/code/core/Mage/Rss/Block/Wishlist.php	141	rss_wishlist_xml_callback
app/code/core/Mage/Rss/Block/Order/New.php	77	rss_order_new_collection_select
app/code/core/Mage/Rss/Block/Catalog/Review.php	86	rss_catalog_review_collection_select
app/code/core/Mage/Rss/Block/Catalog/Tag.php	93	rss_catalog_tagged_item_xml_callback
app/code/core/Mage/Rss/Block/Catalog/NotifyStock.php	108	rss_catalog_notify_stock_collection_select
app/code/core/Mage/Rss/Block/Catalog/Category.php	119	rss_catalog_category_xml_callback
app/code/core/Mage/Rss/Block/Catalog/New.php	133	rss_catalog_new_xml_callback
app/code/core/Mage/Rss/Block/Catalog/Special.php	165	rss_catalog_special_xml_callback
app/code/core/Mage/Customer/controllers/AccountController.php	335	customer_register_success
app/code/core/Mage/Customer/Helper/Data.php	329	customer_registration_is_allowed
app/code/core/Mage/Customer/Model/Address/Abstract.php	329	customer_address_format
app/code/core/Mage/Customer/Model/Session.php	75	customer_session_init
app/code/core/Mage/Customer/Model/Session.php	225	customer_login
app/code/core/Mage/Customer/Model/Session.php	253	customer_logout
app/code/core/Mage/Customer/Model/Customer.php	166	customer_customer_authenticated
app/code/core/Mage/Paypal/Model/Cart.php	318	paypal_prepare_line_items
app/code/core/Mage/Paypal/Model/Payment/Transaction.php	100	$this->_eventPrefix . '_load_by_txn_id_before
app/code/core/Mage/Paypal/Model/Payment/Transaction.php	129	$this->_eventPrefix . '_load_by_txn_id_after
app/code/core/Mage/Tax/Model/Calculation/Rate.php	110	tax_settings_change_after
app/code/core/Mage/Tax/Model/Calculation/Rate.php	136	tax_settings_change_after
app/code/core/Mage/Tax/Model/Calculation/Rate.php	180	tax_settings_change_after
app/code/core/Mage/Tax/Model/Calculation/Rule.php	73	tax_settings_change_after
app/code/core/Mage/Tax/Model/Calculation/Rule.php	85	tax_settings_change_after
app/code/core/Mage/Tax/Model/Calculation.php	191	tax_rate_data_fetch
app/code/core/Mage/Wishlist/Block/Customer/Wishlist/Item/Options.php	52	product_option_renderer_init
app/code/core/Mage/Wishlist/controllers/IndexController.php	192	wishlist_add_product
app/code/core/Mage/Wishlist/controllers/IndexController.php	309	wishlist_update_item
app/code/core/Mage/Wishlist/controllers/IndexController.php	666	wishlist_share
app/code/core/Mage/Wishlist/Helper/Data.php	560	wishlist_items_renewed
app/code/core/Mage/Wishlist/Model/Resource/Item/Collection.php	192	wishlist_item_collection_products_after_load
app/code/core/Mage/Wishlist/Model/Wishlist.php	290	wishlist_add_item
app/code/core/Mage/Wishlist/Model/Wishlist.php	375	wishlist_product_add_after
app/code/core/Mage/Admin/Model/User.php	331	admin_user_authenticate_before
app/code/core/Mage/Admin/Model/User.php	348	admin_user_authenticate_after
app/code/core/Mage/Admin/Model/Session.php	104	admin_session_user_login_success
app/code/core/Mage/Admin/Model/Session.php	112	admin_session_user_login_failed
app/code/core/Mage/Cms/Controller/Router.php	71	cms_controller_router_match_before
app/code/core/Mage/Cms/Helper/Wysiwyg/Images.php	158	cms_wysiwyg_images_static_urls_allowed
app/code/core/Mage/Cms/Helper/Page.php	107	cms_page_render
app/code/core/Mage/Cms/Model/Wysiwyg/Config.php	97	cms_wysiwyg_config_prepare
app/code/core/Mage/Cms/Model/Page.php	152	cms_page_get_available_statuses
app/code/core/Mage/Persistent/controllers/IndexController.php	84	persistent_session_expired
app/code/core/Mage/Persistent/Model/Observer.php	492	persistent_session_expired
app/code/core/Mage/Core/Controller/Varien/Action.php	299	controller_action_layout_load_before
app/code/core/Mage/Core/Controller/Varien/Action.php	317	controller_action_layout_generate_xml_before
app/code/core/Mage/Core/Controller/Varien/Action.php	336	controller_action_layout_generate_blocks_before
app/code/core/Mage/Core/Controller/Varien/Action.php	348	controller_action_layout_generate_blocks_after
app/code/core/Mage/Core/Controller/Varien/Action.php	384	controller_action_layout_render_before
app/code/core/Mage/Core/Controller/Varien/Action.php	385	controller_action_layout_render_before_'.$this->getFullActionName(
app/code/core/Mage/Core/Controller/Varien/Action.php	528	controller_action_predispatch
app/code/core/Mage/Core/Controller/Varien/Action.php	529	controller_action_predispatch_' . $this->getRequest(
app/code/core/Mage/Core/Controller/Varien/Action.php	531	controller_action_predispatch_' . $this->getFullActionName(
app/code/core/Mage/Core/Controller/Varien/Action.php	544	controller_action_postdispatch_'.$this->getFullActionName(
app/code/core/Mage/Core/Controller/Varien/Action.php	548	controller_action_postdispatch_'.$this->getRequest(
app/code/core/Mage/Core/Controller/Varien/Action.php	552	controller_action_postdispatch
app/code/core/Mage/Core/Controller/Varien/Action.php	561	controller_action_noroute
app/code/core/Mage/Core/Controller/Varien/Action.php	580	controller_action_nocookies
app/code/core/Mage/Core/Controller/Varien/Front.php	128	controller_front_init_before
app/code/core/Mage/Core/Controller/Varien/Front.php	147	controller_front_init_routers
app/code/core/Mage/Core/Controller/Varien/Front.php	186	controller_front_send_response_before
app/code/core/Mage/Core/Controller/Varien/Front.php	190	controller_front_send_response_after
app/code/core/Mage/Core/Controller/Response/Http.php	82	http_response_send_before
app/code/core/Mage/Core/Controller/Response/Http.php	103	controller_response_redirect
app/code/core/Mage/Core/Block/Abstract.php	237	core_block_abstract_prepare_layout_before
app/code/core/Mage/Core/Block/Abstract.php	850	core_block_abstract_to_html_before
app/code/core/Mage/Core/Block/Abstract.php	886	core_block_abstract_to_html_after
app/code/core/Mage/Core/Helper/Data.php	447	$eventName
app/code/core/Mage/Core/Model/Layout.php	459	core_layout_block_create_after
app/code/core/Mage/Core/Model/Resource/Db/Collection/Abstract.php	586	core_collection_abstract_load_before
app/code/core/Mage/Core/Model/Resource/Db/Collection/Abstract.php	588	$this->_eventPrefix.'_load_before
app/code/core/Mage/Core/Model/Resource/Db/Collection/Abstract.php	635	core_collection_abstract_load_after
app/code/core/Mage/Core/Model/Resource/Db/Collection/Abstract.php	637	$this->_eventPrefix.'_load_after
app/code/core/Mage/Core/Model/Session/Abstract.php	216	core_session_abstract_clear_messages
app/code/core/Mage/Core/Model/Session/Abstract.php	252	core_session_abstract_add_message
app/code/core/Mage/Core/Model/App.php	1172	application_clean_cache
app/code/core/Mage/Core/Model/Layout/Update.php	419	core_layout_update_updates_get_after
app/code/core/Mage/Core/Model/Observer.php	106	core_clean_cache
app/code/core/Mage/Core/Model/Abstract.php	253	model_load_before
app/code/core/Mage/Core/Model/Abstract.php	255	$this->_eventPrefix.'_load_before
app/code/core/Mage/Core/Model/Abstract.php	266	model_load_after
app/code/core/Mage/Core/Model/Abstract.php	267	$this->_eventPrefix.'_load_after
app/code/core/Mage/Core/Model/Abstract.php	343	model_save_commit_after
app/code/core/Mage/Core/Model/Abstract.php	344	$this->_eventPrefix.'_save_commit_after
app/code/core/Mage/Core/Model/Abstract.php	390	model_save_before
app/code/core/Mage/Core/Model/Abstract.php	391	$this->_eventPrefix.'_save_before
app/code/core/Mage/Core/Model/Abstract.php	465	model_save_after
app/code/core/Mage/Core/Model/Abstract.php	466	$this->_eventPrefix.'_save_after
app/code/core/Mage/Core/Model/Abstract.php	500	model_delete_before
app/code/core/Mage/Core/Model/Abstract.php	501	$this->_eventPrefix.'_delete_before
app/code/core/Mage/Core/Model/Abstract.php	528	model_delete_after
app/code/core/Mage/Core/Model/Abstract.php	529	$this->_eventPrefix.'_delete_after
app/code/core/Mage/Core/Model/Abstract.php	540	model_delete_commit_after
app/code/core/Mage/Core/Model/Abstract.php	541	$this->_eventPrefix.'_delete_commit_after
app/code/core/Mage/Core/Model/Abstract.php	568	$this->_eventPrefix.'_clear
app/code/core/Mage/Core/Model/Locale.php	139	core_locale_set_locale
app/code/core/Mage/Core/Model/Locale.php	582	currency_display_options_forming
app/code/core/Mage/Core/Model/Resource.php	278	resource_get_tablename
app/code/core/Mage/Api/Model/User.php	211	api_user_authenticated
app/code/core/Mage/Poll/controllers/VoteController.php	67	poll_vote_add
app/code/core/Mage/XmlConnect/controllers/CartController.php	225	checkout_cart_add_product_complete
app/code/core/Mage/XmlConnect/controllers/CartController.php	355	enterprise_giftcardaccount_add
app/code/core/Mage/XmlConnect/controllers/ReviewController.php	43	review_controller_product_init_before
app/code/core/Mage/XmlConnect/controllers/ReviewController.php	49	review_controller_product_init
app/code/core/Mage/XmlConnect/controllers/WishlistController.php	139	wishlist_add_product
app/code/core/Mage/XmlConnect/controllers/CheckoutController.php	334	checkout_controller_onepage_save_shipping_method
app/code/core/Mage/XmlConnect/controllers/CheckoutController.php	344	checkout_controller_onepage_save_shipping_method
app/code/core/Mage/XmlConnect/Model/Queue.php	292	before_save_message_queue
app/code/core/Mage/CatalogIndex/Model/Resource/Price.php	138	catalogindex_prepare_price_select
app/code/core/Mage/CatalogIndex/Model/Resource/Price.php	177	catalogindex_prepare_price_select
app/code/core/Mage/CatalogIndex/Model/Resource/Price.php	231	catalogindex_prepare_price_select
app/code/core/Mage/CatalogIndex/Model/Resource/Price.php	281	catalogindex_prepare_price_select
app/code/core/Mage/CatalogIndex/Model/Indexer.php	372	catalogindex_plain_reindex_after
app/code/core/Mage/CatalogIndex/Model/Indexer.php	632	catalogindex_prepare_price_select
app/code/core/Mage/CatalogIndex/Model/Data/Abstract.php	204	catalogindex_get_minimal_price
app/code/core/Mage/Index/Model/Indexer.php	157	start_index_events' . $this->_getEventTypeName($entity
app/code/core/Mage/Index/Model/Indexer.php	182	end_index_events' . $this->_getEventTypeName($entity
app/code/core/Mage/Index/Model/Indexer.php	249	start_process_event' . $this->_getEventTypeName($entityType
app/code/core/Mage/Index/Model/Indexer.php	280	end_process_event' . $this->_getEventTypeName($entityType
app/code/core/Mage/Index/Model/Process.php	224	after_reindex_process_' . $this->getIndexerCode(
app/code/core/Mage/Index/Model/Process.php	505	index_process_change_status
app/code/core/Mage/CurrencySymbol/Model/System/Currencysymbol.php	218	admin_system_config_changed_section_currency_before_reinit
app/code/core/Mage/CurrencySymbol/Model/System/Currencysymbol.php	228	admin_system_config_changed_section_currency
app/code/core/Mage/Review/controllers/ProductController.php	73	review_controller_product_init_before
app/code/core/Mage/Review/controllers/ProductController.php	88	review_controller_product_init
app/code/core/Mage/Review/Model/Resource/Review/Collection.php	269	review_review_collection_load_before
app/code/core/Mage/GiftMessage/Block/Message/Inline.php	177	gift_options_prepare_items
app/code/core/Mage/GiftMessage/Model/Api.php	64	magento/app/code/core/Mage/GiftMessage/Model/Api.php
app/code/core/Mage/GiftMessage/Model/Api.php	67	checkout_controller_onepage_save_shipping_method
app/code/core/Mage/GiftMessage/Model/Api/V2.php	91	magento/app/code/core/Mage/GiftMessage/Model/Api/V2.php
app/code/core/Mage/GiftMessage/Model/Api/V2.php	94	checkout_controller_onepage_save_shipping_method
app/code/core/Mage/Payment/Block/Form/Cc.php	154	payment_form_block_to_html_before
app/code/core/Mage/Payment/Block/Info.php	166	payment_info_block_prepare_specific_information
app/code/core/Mage/Payment/Model/Method/Abstract.php	642	payment_method_is_active
app/code/core/Mage/CatalogRule/Model/Resource/Rule.php	395	catalogrule_before_apply
app/code/core/Mage/CatalogRule/Model/Resource/Rule.php	533	catalogrule_after_apply
app/code/core/Mage/SalesRule/Model/Validator.php	425	salesrule_validator_process
app/code/core/Mage/SalesRule/Model/Rule.php	398	salesrule_rule_get_coupon_types
app/code/core/Mage/SalesRule/Model/Rule/Condition/Combine.php	54	salesrule_rule_condition_combine
app/code/core/Mage/SalesRule/Model/Quote/Discount.php	86	sales_quote_address_discount_item
app/code/core/Mage/SalesRule/Model/Quote/Discount.php	92	sales_quote_address_discount_item
app/code/core/Mage/Sales/Model/Resource/Order/Address/Collection.php	69	$this->_eventPrefix . '_load_after
app/code/core/Mage/Sales/Model/Resource/Order/Abstract.php	142	$this->_eventPrefix . '_init_virtual_grid_columns
app/code/core/Mage/Sales/Model/Resource/Order/Abstract.php	167	$this->_eventPrefix . '_update_grid_records
app/code/core/Mage/Sales/Model/Resource/Order/Abstract.php	295	$this->_eventPrefix . '_save_attribute_before
app/code/core/Mage/Sales/Model/Resource/Order/Abstract.php	314	$this->_eventPrefix . '_save_attribute_after
app/code/core/Mage/Sales/Model/Resource/Order/Collection/Abstract.php	61	$this->_eventPrefix . '_set_sales_order
app/code/core/Mage/Sales/Model/Resource/Quote/Address/Collection.php	82	$this->_eventPrefix.'_load_after
app/code/core/Mage/Sales/Model/Resource/Quote/Item/Collection.php	187	prepare_catalog_product_collection_prices
app/code/core/Mage/Sales/Model/Resource/Quote/Item/Collection.php	191	sales_quote_item_collection_products_after_load
app/code/core/Mage/Sales/Model/Resource/Sale/Collection.php	154	sales_sale_collection_query_before
app/code/core/Mage/Sales/Model/Convert/Quote.php	57	sales_convert_quote_to_order
app/code/core/Mage/Sales/Model/Convert/Quote.php	75	sales_convert_quote_address_to_order
app/code/core/Mage/Sales/Model/Convert/Quote.php	95	sales_convert_quote_address_to_order_address
app/code/core/Mage/Sales/Model/Convert/Quote.php	114	sales_convert_quote_payment_to_order_payment
app/code/core/Mage/Sales/Model/Convert/Quote.php	154	sales_convert_quote_item_to_order_item
app/code/core/Mage/Sales/Model/Convert/Order.php	53	sales_convert_order_to_quote
app/code/core/Mage/Sales/Model/Quote.php	826	sales_quote_remove_item
app/code/core/Mage/Sales/Model/Quote.php	874	sales_quote_add_item
app/code/core/Mage/Sales/Model/Quote.php	957	sales_quote_product_add_after
app/code/core/Mage/Sales/Model/Quote.php	1245	$this->_eventPrefix . '_collect_totals_before
app/code/core/Mage/Sales/Model/Quote.php	1310	$this->_eventPrefix . '_collect_totals_after
app/code/core/Mage/Sales/Model/Quote.php	1680	$this->_eventPrefix . '_merge_before
app/code/core/Mage/Sales/Model/Quote.php	1723	$this->_eventPrefix . '_merge_after
app/code/core/Mage/Sales/Model/Service/Quote.php	186	checkout_type_onepage_save_order
app/code/core/Mage/Sales/Model/Service/Quote.php	191	sales_model_service_quote_submit_success
app/code/core/Mage/Sales/Model/Service/Quote.php	207	sales_model_service_quote_submit_failure
app/code/core/Mage/Sales/Model/Service/Quote.php	210	sales_model_service_quote_submit_after
app/code/core/Mage/Sales/Model/Order.php	1094	sales_order_place_before
app/code/core/Mage/Sales/Model/Order.php	1139	order_cancel_after
app/code/core/Mage/Sales/Model/Order/Payment.php	277	sales_order_payment_place_start
app/code/core/Mage/Sales/Model/Order/Payment.php	356	sales_order_payment_place_end
app/code/core/Mage/Sales/Model/Order/Payment.php	394	sales_order_payment_capture
app/code/core/Mage/Sales/Model/Order/Payment.php	535	sales_order_payment_pay
app/code/core/Mage/Sales/Model/Order/Payment.php	553	sales_order_payment_cancel_invoice
app/code/core/Mage/Sales/Model/Order/Payment.php	603	sales_order_payment_void
app/code/core/Mage/Sales/Model/Order/Payment.php	691	sales_order_payment_refund
app/code/core/Mage/Sales/Model/Order/Payment.php	797	sales_order_payment_cancel_creditmemo
app/code/core/Mage/Sales/Model/Order/Payment.php	825	sales_order_payment_cancel
app/code/core/Mage/Sales/Model/Order/Invoice.php	418	sales_order_invoice_pay
app/code/core/Mage/Sales/Model/Order/Invoice.php	488	sales_order_invoice_cancel
app/code/core/Mage/Sales/Model/Order/Invoice.php	684	sales_order_invoice_register
app/code/core/Mage/Sales/Model/Order/Item.php	512	sales_order_item_cancel
app/code/core/Mage/Sales/Model/Order/Payment/Transaction.php	417	$this->_eventPrefix . '_load_by_txn_id_before
app/code/core/Mage/Sales/Model/Order/Payment/Transaction.php	443	$this->_eventPrefix . '_load_by_txn_id_after
app/code/core/Mage/Sales/Model/Order/Creditmemo.php	461	sales_order_creditmemo_refund
app/code/core/Mage/Sales/Model/Order/Creditmemo.php	508	sales_order_creditmemo_cancel
app/code/core/Mage/Sales/Model/Quote/Payment.php	133	$this->_eventPrefix . '_import_data_before
app/code/core/Mage/Sales/Model/Quote/Item.php	300	sales_quote_item_qty_set_after
app/code/core/Mage/Sales/Model/Quote/Item.php	404	sales_quote_item_set_product
app/code/core/Mage/Sales/Model/Quote/Address.php	955	$this->_eventPrefix . '_collect_totals_before
app/code/core/Mage/Sales/Model/Quote/Address.php	959	$this->_eventPrefix . '_collect_totals_after
app/code/core/Mage/Sales/Model/Quote/Address/Total/Discount.php	80	sales_quote_address_discount_item
app/code/core/Mage/Sales/Model/Quote/Address/Total/Discount.php	111	sales_quote_address_discount_item
app/code/core/Mage/Sales/Model/Quote/Config.php	36	sales_quote_config_get_product_attributes
app/code/core/Mage/Sales/Model/Observer.php	52	clear_expired_quotes_before
app/code/core/Mage/Checkout/controllers/MultishippingController.php	344	checkout_controller_multishipping_shipping_post
app/code/core/Mage/Checkout/controllers/MultishippingController.php	545	checkout_multishipping_controller_success_action
app/code/core/Mage/Checkout/controllers/CartController.php	205	checkout_cart_add_product_complete
app/code/core/Mage/Checkout/controllers/CartController.php	346	checkout_cart_update_item_complete
app/code/core/Mage/Checkout/controllers/OnepageController.php	243	checkout_onepage_controller_success_action
app/code/core/Mage/Checkout/controllers/OnepageController.php	387	checkout_controller_onepage_save_shipping_method
app/code/core/Mage/Checkout/Helper/Data.php	279	checkout_allow_guest
app/code/core/Mage/Checkout/Model/Cart.php	296	checkout_cart_product_add_after
app/code/core/Mage/Checkout/Model/Cart.php	396	checkout_cart_update_items_before
app/code/core/Mage/Checkout/Model/Cart.php	437	checkout_cart_update_items_after
app/code/core/Mage/Checkout/Model/Cart.php	460	checkout_cart_save_before
app/code/core/Mage/Checkout/Model/Cart.php	470	checkout_cart_save_after
app/code/core/Mage/Checkout/Model/Cart.php	605	checkout_cart_product_update_after
app/code/core/Mage/Checkout/Model/Session.php	111	custom_quote_process
app/code/core/Mage/Checkout/Model/Session.php	152	checkout_quote_init
app/code/core/Mage/Checkout/Model/Session.php	201	load_customer_quote_before
app/code/core/Mage/Checkout/Model/Session.php	362	checkout_quote_destroy
app/code/core/Mage/Checkout/Model/Cart/Api.php	174	checkout_type_onepage_save_order_after
app/code/core/Mage/Checkout/Model/Cart/Api.php	184	checkout_submit_all_after
app/code/core/Mage/Checkout/Model/Type/Onepage.php	790	checkout_type_onepage_save_order_after
app/code/core/Mage/Checkout/Model/Type/Onepage.php	832	checkout_submit_all_after
app/code/core/Mage/Checkout/Model/Type/Multishipping.php	278	checkout_type_multishipping_set_shipping_items
app/code/core/Mage/Checkout/Model/Type/Multishipping.php	514	checkout_type_multishipping_create_orders_single
app/code/core/Mage/Checkout/Model/Type/Multishipping.php	536	checkout_submit_all_after
app/code/core/Mage/Checkout/Model/Type/Multishipping.php	540	checkout_multishipping_refund_all
app/code/core/Mage/Sendfriend/controllers/ProductController.php	131	sendfriend_product
app/code/core/Mage/Catalog/Block/Product/View.php	194	catalog_product_view_config
app/code/core/Mage/Catalog/Block/Product/List.php	161	catalog_block_product_list_collection
app/code/core/Mage/Catalog/Block/Product/List/Upsell.php	79	catalog_product_upsell
app/code/core/Mage/Catalog/Block/Product/View/Type/Configurable.php	185	catalog_product_type_configurable_price
app/code/core/Mage/Catalog/controllers/CategoryController.php	43	catalog_controller_category_init_before
app/code/core/Mage/Catalog/controllers/CategoryController.php	59	catalog_controller_category_init_after
app/code/core/Mage/Catalog/controllers/Product/CompareController.php	90	catalog_product_compare_add_product
app/code/core/Mage/Catalog/controllers/Product/CompareController.php	129	catalog_product_compare_remove_product
app/code/core/Mage/Catalog/Helper/Output.php	48	catalog_helper_output_construct
app/code/core/Mage/Catalog/Helper/Product/View.php	135	catalog_controller_product_view
app/code/core/Mage/Catalog/Helper/Product.php	290	catalog_controller_product_init_before
app/code/core/Mage/Catalog/Helper/Product.php	332	catalog_controller_product_init
app/code/core/Mage/Catalog/Model/Resource/Layer/Filter/Price.php	172	catalogindex_prepare_price_select
app/code/core/Mage/Catalog/Model/Resource/Layer/Filter/Price.php	177	catalog_prepare_price_select
app/code/core/Mage/Catalog/Model/Resource/Category/Flat/Collection.php	117	$this->_eventPrefix . '_load_before
app/code/core/Mage/Catalog/Model/Resource/Category/Flat/Collection.php	129	$this->_eventPrefix . '_load_after
app/code/core/Mage/Catalog/Model/Resource/Category/Flat/Collection.php	208	$this->_eventPrefix . '_add_is_active_filter
app/code/core/Mage/Catalog/Model/Resource/Category/Tree.php	210	catalog_category_tree_init_inactive_category_ids
app/code/core/Mage/Catalog/Model/Resource/Category/Tree.php	406	catalog_category_tree_move_before
app/code/core/Mage/Catalog/Model/Resource/Category/Tree.php	443	catalog_category_tree_move_after
app/code/core/Mage/Catalog/Model/Resource/Category/Flat.php	205	catalog_category_tree_init_inactive_category_ids
app/code/core/Mage/Catalog/Model/Resource/Category/Flat.php	285	catalog_category_flat_loadnodes_before
app/code/core/Mage/Catalog/Model/Resource/Category/Collection.php	138	$this->_eventPrefix . '_load_before
app/code/core/Mage/Catalog/Model/Resource/Category/Collection.php	150	$this->_eventPrefix . '_load_after
app/code/core/Mage/Catalog/Model/Resource/Category/Collection.php	345	$this->_eventPrefix . '_add_is_active_filter
app/code/core/Mage/Catalog/Model/Resource/Category.php	364	catalog_category_change_products
app/code/core/Mage/Catalog/Model/Resource/Product/Flat/Indexer.php	437	catalog_product_flat_prepare_columns
app/code/core/Mage/Catalog/Model/Resource/Product/Flat/Indexer.php	497	catalog_product_flat_prepare_indexes
app/code/core/Mage/Catalog/Model/Resource/Product/Flat/Indexer.php	1038	catalog_product_flat_rebuild
app/code/core/Mage/Catalog/Model/Resource/Product/Flat/Indexer.php	1281	catalog_product_flat_update_product
app/code/core/Mage/Catalog/Model/Resource/Product/Indexer/Price/Grouped.php	125	catalog_product_prepare_index_select
app/code/core/Mage/Catalog/Model/Resource/Product/Indexer/Price/Default.php	279	prepare_catalog_product_index_select
app/code/core/Mage/Catalog/Model/Resource/Product/Indexer/Price/Default.php	296	prepare_catalog_product_price_index_table
app/code/core/Mage/Catalog/Model/Resource/Product/Indexer/Eav/Decimal.php	98	prepare_catalog_product_index_select
app/code/core/Mage/Catalog/Model/Resource/Product/Indexer/Eav/Source.php	154	prepare_catalog_product_index_select
app/code/core/Mage/Catalog/Model/Resource/Product/Indexer/Eav/Source.php	228	prepare_catalog_product_index_select
app/code/core/Mage/Catalog/Model/Resource/Product/Indexer/Eav/Abstract.php	208	prepare_catalog_product_index_select
app/code/core/Mage/Catalog/Model/Resource/Product/Compare/Item/Collection.php	315	catalog_product_compare_item_collection_clear
app/code/core/Mage/Catalog/Model/Resource/Product/Collection.php	247	catalog_prepare_price_select
app/code/core/Mage/Catalog/Model/Resource/Product/Collection.php	506	catalog_product_collection_load_before
app/code/core/Mage/Catalog/Model/Resource/Product/Collection.php	526	catalog_product_collection_load_after
app/code/core/Mage/Catalog/Model/Resource/Product/Collection.php	1026	catalog_product_collection_before_add_count_to_categories
app/code/core/Mage/Catalog/Model/Resource/Product/Collection.php	1859	catalog_product_collection_apply_limitations_after
app/code/core/Mage/Catalog/Model/Convert/Adapter/Product.php	837	$this->_eventPrefix . '_after
app/code/core/Mage/Catalog/Model/Category.php	229	catalog_category_tree_move_before
app/code/core/Mage/Catalog/Model/Category.php	230	$this->_eventPrefix.'_move_before
app/code/core/Mage/Catalog/Model/Category.php	234	$this->_eventPrefix.'_move_after
app/code/core/Mage/Catalog/Model/Category.php	247	category_move
app/code/core/Mage/Catalog/Model/Product/Action.php	66	catalog_product_attribute_update_before
app/code/core/Mage/Catalog/Model/Product/Action.php	99	catalog_product_website_update_before
app/code/core/Mage/Catalog/Model/Product/Action.php	123	catalog_product_website_update
app/code/core/Mage/Catalog/Model/Product/Option/Api.php	166	catalog_product_prepare_save
app/code/core/Mage/Catalog/Model/Product/Attribute/Backend/Media.php	166	catalog_product_media_save_before
app/code/core/Mage/Catalog/Model/Product/Attribute/Backend/Media.php	273	catalog_product_media_add_image
app/code/core/Mage/Catalog/Model/Product/Attribute/Source/Inputtype.php	55	adminhtml_product_attribute_types
app/code/core/Mage/Catalog/Model/Product/Type/Price.php	83	catalog_product_get_final_price
app/code/core/Mage/Catalog/Model/Product/Type/Grouped/Price.php	70	catalog_product_type_grouped_price
app/code/core/Mage/Catalog/Model/Product/Type/Abstract.php	542	$eventName
app/code/core/Mage/Catalog/Model/Product/Type/Configurable/Price.php	52	catalog_product_get_final_price
app/code/core/Mage/Catalog/Model/Product/Type/Configurable/Price.php	94	catalog_product_type_configurable_price
app/code/core/Mage/Catalog/Model/Product/Status.php	217	catalog_product_status_update
app/code/core/Mage/Catalog/Model/Product.php	187	$this->_eventPrefix.'_validate_before
app/code/core/Mage/Catalog/Model/Product.php	189	$this->_eventPrefix.'_validate_after
app/code/core/Mage/Catalog/Model/Product.php	1081	catalog_model_product_duplicate
app/code/core/Mage/Catalog/Model/Product.php	1292	catalog_product_is_salable_before
app/code/core/Mage/Catalog/Model/Product.php	1302	catalog_product_is_salable_after
app/code/core/Mage/Catalog/Model/Product.php	1526	$this->_eventPrefix.'_delete_after_done
app/code/core/Mage/GoogleBase/controllers/Adminhtml/Googlebase/TypesController.php	46	controller_action_postdispatch_adminhtml
app/code/core/Mage/Page/Block/Html/Topmenu.php	60	page_block_html_topmenu_gethtml_before
app/code/core/Mage/Page/Block/Html/Topmenu.php	69	page_block_html_topmenu_gethtml_after
app/code/core/Mage/Log/Model/Resource/Visitor/Collection.php	240	log_visitor_collection_load_before
app/code/core/Mage/Log/Model/Resource/Log.php	56	log_log_clean_before
app/code/core/Mage/Log/Model/Resource/Log.php	64	log_log_clean_after
app/code/core/Mage/Log/Model/Visitor.php	168	visitor_init
app/code/core/Mage/Rule/Model/Environment.php	40	rule_environment_collect
app/code/core/Mage/Eav/Block/Adminhtml/Attribute/Edit/Main/Abstract.php	176	adminhtml_block_eav_attribute_edit_form_init
app/code/core/Mage/Eav/Model/Entity/Collection/Abstract.php	863	eav_collection_abstract_load_before
app/code/core/Mage/ImportExport/Model/Import/Entity/Product.php	356	catalog_product_import_finish_before
app/code/core/Mage/CatalogSearch/Model/Resource/Advanced.php	67	catalog_prepare_price_select
app/code/core/Mage/CatalogSearch/Model/Resource/Fulltext.php	281	catalogsearch_reset_search_result
app/code/core/Mage/CatalogSearch/Model/Resource/Fulltext.php	407	catelogsearch_searchable_attributes_load_after
app/code/core/Mage/CatalogSearch/Model/Fulltext.php	79	catalogsearch_index_process_start
app/code/core/Mage/CatalogSearch/Model/Fulltext.php	86	catalogsearch_index_process_complete
app/code/core/Mage/Bundle/Block/Catalog/Product/View/Type/Bundle.php	160	bundle_product_view_config
app/code/core/Mage/Bundle/Model/Resource/Price/Index.php	378	catalog_product_prepare_index_select
app/code/core/Mage/Bundle/Model/Resource/Indexer/Price.php	291	catalog_product_prepare_index_select
app/code/core/Mage/Bundle/Model/Resource/Indexer/Price.php	563	prepare_catalog_product_price_index_table
app/code/core/Mage/Bundle/Model/Product/Price.php	87	prepare_catalog_product_collection_prices
app/code/core/Mage/Bundle/Model/Product/Price.php	120	catalog_product_get_final_price
app/code/core/Mage/Bundle/Model/Product/Price.php	437	catalog_product_get_final_price
app/code/core/Mage/Tag/Model/Resource/Indexer/Summary.php	215	prepare_catalog_product_index_select

-----------------------------------------------------------------------------------------------------------




<?php
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
$product = Mage::getModel('catalog/product');
//    if(!$product->getIdBySku('testsku61')):

try{
  $product
//    ->setStoreId(1) //you can set data in store scope
    ->setWebsiteIds(array(1)) //website ID the product is assigned to, as an array
    ->setAttributeSetId(9) //ID of a attribute set named 'default'
    ->setTypeId('simple') //product type
    ->setCreatedAt(strtotime('now')) //product creation time
//    ->setUpdatedAt(strtotime('now')) //product update time
    
    ->setSku('testsku61') //SKU
    ->setName('test product21') //product name
    ->setWeight(4.0000)
    ->setStatus(1) //product status (1 - enabled, 2 - disabled)
    ->setTaxClassId(4) //tax class (0 - none, 1 - default, 2 - taxable, 4 - shipping)
    ->setVisibility(Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH) //catalog and search visibility
    ->setManufacturer(28) //manufacturer id
    ->setColor(24)
    ->setNewsFromDate('06/26/2014') //product set as new from
    ->setNewsToDate('06/30/2014') //product set as new to
    ->setCountryOfManufacture('AF') //country of manufacture (2-letter country code)
    
    ->setPrice(11.22) //price in form 11.22
    ->setCost(22.33) //price in form 11.22
    ->setSpecialPrice(00.44) //special price in form 11.22
    ->setSpecialFromDate('06/1/2014') //special price from (MM-DD-YYYY)
    ->setSpecialToDate('06/30/2014') //special price to (MM-DD-YYYY)
    ->setMsrpEnabled(1) //enable MAP
    ->setMsrpDisplayActualPriceType(1) //display actual price (1 - on gesture, 2 - in cart, 3 - before order confirmation, 4 - use config)
    ->setMsrp(99.99) //Manufacturer's Suggested Retail Price
    
    ->setMetaTitle('test meta title 2')
    ->setMetaKeyword('test meta keyword 2')
    ->setMetaDescription('test meta description 2')
    
    ->setDescription('This is a long description')
    ->setShortDescription('This is a short description')
    
    ->setMediaGallery (array('images'=>array (), 'values'=>array ())) //media gallery initialization
    ->addImageToMediaGallery('media/catalog/product/1/0/10243-1.png', array('image','thumbnail','small_image'), false, false) //assigning image, thumb and small image to media gallery
    
    ->setStockData(array(
                       'use_config_manage_stock' => 0, //'Use config settings' checkbox
                       'manage_stock'=>1, //manage stock
                       'min_sale_qty'=>1, //Minimum Qty Allowed in Shopping Cart
                       'max_sale_qty'=>2, //Maximum Qty Allowed in Shopping Cart
                       'is_in_stock' => 1, //Stock Availability
                       'qty' => 999 //qty
                       )
    )
    
    ->setCategoryIds(array(3, 10)); //assign product to categories
    $product->save();
//endif;
  }catch(Exception $e){
    Mage::log($e->getMessage());
  }










