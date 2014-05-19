USE [teste]
GO

/****** Object:  Table [dbo].[Usuarios]    Script Date: 05/19/2014 14:07:20 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[Usuarios](
	[id] [int] NULL,
	[nome] [varchar](50) NULL
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO

INSERT INTO [teste].[dbo].[Usuarios]
           ([id]
           ,[nome])
     VALUES
           ('1'
           ,'Funcionário de Teste');
GO


