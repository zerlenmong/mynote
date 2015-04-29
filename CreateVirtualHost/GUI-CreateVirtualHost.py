# !/usr/bin/evn python
import pygtk
pygtk.require('2.0')
import gtk
import os

class GUIpython:
	Elements    = {}
	serverNameValue   = ''
	serverAliasValue  = ''
	serverAdminValue  = 'admin@localhost.com'
	documentRootValue = ''
	virtualHostFileNameValue  = ''
	virtualHostPathValue      = '/etc/apache2/sites-available/'
	hostsFileValue            = '/etc/hosts'
	ipValue                   = '127.0.0.1'
	CGIScriptValue            = '/home/daniel/www/php-fcgi/default.cgi'
	FCGIWrapperPathValue      = '/home/daniel/www/php-fcgi/'
	disableVirtualHostCommandValue = 'a2dissite'
	enableVirtualHostCommandValue  = 'a2ensite'
	restartServerCommandValue      = '/etc/init.d/apache2 restart'
	isFastCGIMod                   = True


	tableRow = 15
	tableCol = 2


	def __init__(self):
		# init window
		self.window = gtk.Window(gtk.WINDOW_TOPLEVEL)
		# self.window.set_border_width(10)

		# Create Table
		self.Table = gtk.Table(self.tableRow, self.tableCol, True)

		# Create Form List
		self.createFormList()

		self.createEntry()

		# Create checkButton
		# is fastcgi
		self.isFastCGI()

		# Create button
		self.createButton()

		self.window.connect('destroy', gtk.mainquit)
		self.window.add(self.Table)
		self.window.show_all()
		gtk.main()


	def sortingData(self, widget, event, data=None):
		self.serverNameValue  = self.Elements['serverName'].get_text()
		self.serverAliasValue = self.Elements['serverAlias'].get_text()
		self.serverAdminValue  =self.Elements['serverAdmin'].get_text()
		self.documentRootValue = self.Elements['documentRoot'].get_filename()
		self.virtualHostFileNameValue = self.Elements['virtualHostFileName'].get_text()
		if len(self.virtualHostFileNameValue) < 1 :
			self.virtualHostFileNameValue = self.serverNameValue
		self.virtualHostPathValue = self.Elements['virtualHostPath'].get_filename()
		self.hostsFileValue = self.Elements['hostsFile'].get_filename()
		self.ipValue = self.Elements['ip'].get_text()
		self.CGIScriptValue = self.Elements['CGIScript'].get_filename()
		# self.FCGIWrapperPathValue = self.Elements['FCGIWrapperPath'].get_filename()
		self.disableVirtualHostCommandValue = self.Elements['disableVirtualHostCommand'].get_text()
		self.enableVirtualHostCommandValue = self.Elements['enableVirtualHostCommand'].get_text()
		self.restartServerCommandValue = self.Elements['restartServerCommand'].get_text()
		self.isFastCGIMod = self.isfastcgi.get_active()
		# print self.Elements[''].get_text()

		self.createVirtualHostFile()


	def createFormList(self):
		self.formList = [
				# [['label Machine code ', 'Text'],['entry Machine code ', 'Text']]
				[['serverNameLabel','Server Name:'],['serverName', self.serverNameValue]],
				[['serverAliasLabel','Server Alias:'],['serverAlias', self.serverAliasValue]],
				[['serverAdminLabel','Server Admin:'],['serverAdmin', self.serverAdminValue]],
				[['documentRootLabel','Document Root:'],['documentRoot', self.documentRootValue, 'FileChooserButton']],
				[['virtualHostFileNameLabel','Virtual Host File Name:'],['virtualHostFileName', self.virtualHostFileNameValue]],
				[['virtualHostPathLabel','Virtual Host Path:'],['virtualHostPath', self.virtualHostPathValue, 'FileChooserButton']],
				[['hostsFileLabel','Hosts File:'],['hostsFile', self.hostsFileValue, 'FileChoose']],
				[['ipLabel','Ip:'],['ip', self.ipValue]],
				[['CGIScriptLabel','CGI Script:'],['CGIScript', self.CGIScriptValue, 'FileChoose']],
				# [['FCGIWrapperPathLabel','FCGI Wrapper Path:'],['FCGIWrapperPath', self.FCGIWrapperPathValue, 'FileChooserButton']],
				[['disableVirtualHostCommandLabel','Disable Host Command:'],['disableVirtualHostCommand', self.disableVirtualHostCommandValue]],
				[['enableVirtualHostCommandLabel','Ensable Host Command:'],['enableVirtualHostCommand', self.enableVirtualHostCommandValue]],
				[['restartServerCommandLabel','Restart Server:'],['restartServerCommand', self.restartServerCommandValue]],
				# [['serverNameLabel','Server Name'],['serverName', 'Defautl value']],
			]


	def isFastCGI(self):
		self.isfastcgi = gtk.CheckButton('Is FastCGI')
		self.isfastcgi.set_active(True)
		self.Table.attach(self.isfastcgi, 1, 2, 13, 14)


	def createButton(self):
		self.createButton = gtk.Button('Create Virtua lHost')
		self.Table.attach(self.createButton, 0, 2, 14, 15)
		self.createButton.connect('clicked', self.sortingData , None)


	def defEntry(self, name, text, left, right, top, button):
		self.Elements[name] = gtk.Entry()
		self.Elements[name].set_text(text)
		self.Table.attach(self.Elements[name], left, right, top, button)


	def defLabel(self,name, text, left, right, top, button):
		self.Elements[name] = gtk.Label()
		self.Elements[name].set_text(text)
		self.Table.attach(self.Elements[name], left, right, top, button)

	def defDirChoose(self, name, text, left, right, top, button):
		self.Elements[name] = gtk.FileChooserButton(text)
		self.Elements[name].set_action(gtk.FILE_CHOOSER_ACTION_SELECT_FOLDER)
		self.Elements[name].set_filename(text)
		self.Table.attach(self.Elements[name], left, right, top, button)


	def defFileChoose(self, name, text, left, right, top, button):
		self.Elements[name] = gtk.FileChooserButton(text)
		self.Elements[name].set_filename(text)
		self.Table.attach(self.Elements[name], left, right, top, button)


	def createEntry(self):
		i = 0
		for item in self.formList :
			button = i+1

			# Label
			self.defLabel(item[0][0],item[0][1], 0, 1, i, button)

			if len(item[1]) > 2 :
				if item[1][2] == 'FileChooserButton' :
					self.defDirChoose(item[1][0], item[1][1], 1, 2, i, button)
				elif item[1][2] == 'FileChoose' :
					self.defFileChoose(item[1][0], item[1][1], 1, 2, i, button)
			else :
				self.defEntry(item[1][0],item[1][1], 1, 2, i, button)

			i = i  + 1


	def isset(self, value):
		try :
			value
		except NameError :
			print 'False'
		else:
			print 'True'



	def modifyHostsFile(self):
		#-*- encoding:UTF-8 -*- 
		try:
			if self.serverNameValue not in open(self.hostsFileValue).read():
				fp = open(self.hostsFileValue,'a+')
				fp.write(self.ipValue + '                                 ' + self.serverNameValue + "\n")
				if len(self.serverAliasValue) :
					fp.write(self.ipValue + '                                 ' + self.serverAliasValue + "\n")
				fp.close()
		except IOError, e:
			print e



	def createVirtualHostFile(self):
		#-*- encoding:UTF-8 -*- 
		if os.path.isfile(self.virtualHostPathValue + '/' + self.virtualHostFileNameValue) :
			print 'File exist!'
		else:
			try:
				fp = open(self.virtualHostPathValue + '/' + self.virtualHostFileNameValue, 'a+')
				fp.write(self.setVirtualHostContent())
				fp.close()

				# Add info to hosts file
				self.modifyHostsFile()
				self.enableVirtualHost()
				self.restartServer()
			except IOError, e:
				print e


	def setVirtualHostContent(self):
		content = "ServerName " + self.ipValue + "\n"
		content += "<VirtualHost *:80>\n"
		content += "	ServerName " + self.serverNameValue + "\n"
		if len(self.serverAliasValue) > 0:
			content += "    ServerAlias " + self.serverAliasValue + "\n"
		content += "    ServerAdmin " + self.serverAdminValue + "\n"
		content += "    DocumentRoot " + self.documentRootValue
		content += self.setVirtualHostDirectory()
		if self.isFastCGIMod :
			content += self.setFCGIDirectory()
		content += "\n</VirtualHost>"
		return content


	def setVirtualHostDirectory(self):
		return """
	<Directory />
		Options FollowSymLinks
		AllowOverride None
	</Directory>
	<Directory """ + self.documentRootValue + """/>
		Options Indexes FollowSymLinks MultiViews
		AllowOverride all
		Order allow,deny
		allow from all
	</Directory>
		"""


	def setFCGIDirectory(self):
		return """
	<IfModule mod_fcgid.c>
	#SuexecUserGroup web1 web1
	<Directory """ + self.documentRootValue + """/>
		Options +ExecCGI
		AllowOverride All
		AddHandler fcgid-script .php
		FCGIWrapper """ + self.CGIScriptValue + """ .php
		Order allow,deny
		Allow from all
	</Directory>
	</IfModule>
		"""


	def enableVirtualHost(self):
		disableCommand = self.disableVirtualHostCommandValue + ' ' + self.virtualHostFileNameValue
		os.system(disableCommand)
		enableCommand = self.enableVirtualHostCommandValue + ' ' + self.virtualHostFileNameValue
		os.system(enableCommand)


	def restartServer(self):
		command = self.restartServerCommandValue
		os.system(command)


GUIpython()